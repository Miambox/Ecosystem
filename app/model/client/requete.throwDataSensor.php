<?php

    function getDatasWithGroupUrl() {    
        $url = 'http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=001D'; // Url web service
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // Check url
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    function sendDataToDatabase($bdd, $datas) {
        $data_tab = str_split($datas, 33);

        $queryCompare = 'SELECT MAX(date_time) FROM trame_recep';
        $donnees = $bdd->prepare($queryCompare);
        $donnees->execute();
        $valeur = $donnees->fetch();
        $max_date_time = $valeur[0];
        
        for($i=0, $size=count($data_tab); $i < $size; $i++) {
            $trame = $data_tab[$i];

            $team = substr($trame, 1, 4);
            $sensor_type = substr($trame, 6, 1);
            $sensor_number = substr($trame, 7, 2);
            $value = substr($trame, 9, 4);
            $year = substr($trame, 19, 4);
            $month = substr($trame, 23, 2);
            $day = substr($trame, 25, 2);
            $hour = substr($trame, 27, 2);
            $minute = substr($trame, 29, 2);
            $second = substr($trame, 31, 2);

            $dateToString =  $year.'-'.$month.'-'.$day.'T'.$hour.'-'.$minute.'-'.$second;

            if ($max_date_time < $dateToString) {
                $query = 'INSERT INTO trame_recep(
                    team,
                    sensor_type,
                    sensor_number,
                    value,
                    date_time
                    ) VALUES (
                    :team,
                    :sensor_type,
                    :sensor_number,
                    :value,
                    :date_time
                )';
            
                $donnees = $bdd->prepare($query);
                $donnees->bindParam(":team", $team);
                $donnees->bindParam(":sensor_type", $sensor_type);
                $donnees->bindParam(":sensor_number", $sensor_number);
                $donnees->bindParam(":value", $value);
                $donnees->bindParam(":date_time", $dateToString);
                $request = $donnees->execute();
                
            }
        }
    }

    function sendDataToPasserelle(
        $team,
        $sensor_type,
        $sensor_number,
        $value,
        $year,
        $month,
        $day,
        $hour,
        $minute,
        $second
    ) {
        $trame = '1'.$team.'1'.$sensor_type.$sensor_number.$value.'0125'.'00'.$year.$month.$day.$hour.$minute.$second;
        var_dump($trame);
        $url = 'http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=001D&TRAME='.$trame; // Url web service
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // Check url
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        $data = curl_exec($ch);
        var_dump($data);
        curl_close($ch);
    }
?>