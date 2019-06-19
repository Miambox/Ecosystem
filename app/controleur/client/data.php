<?php

include('app/model/client/requete.data.php');
include('app/model/client/requete.capteur.php');
include('app/model/client/requete.throwDataSensor.php');


switch ($action) {

    // Vue permettant d'initialiser les valeurs et de les updater.
    case 'capteur':
      // Si on a bien un id_capteur envoyé
      if(isset($_GET['id_capteur'])) {

        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c')); // Date d'aujourd'hui
        $time = explodeTimeInTimestamp(date('c')); // Temps d'aujourd'hui
        $id_programme = intval(securitePourXSSFail($_GET['id_programme']));
        
         /**
         * Le second état représente le check entre l'heure/date du programme comparée à celle de maintenant.
         * Lorsque celles-ci correspondent dans la méthode 'updateSecondeEtat' alors on passe l'état second
         * à ON.
         */
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second état à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
       
        // Puis on sélectionne tous les programmes avec un état second à ON.
        $programme = selectProgrammeOn($bdd, $id_capteur);
        if(sizeof($programme) != 0) {

          foreach ($programme as $key => $value) {
            $programme_on = $value['id'];
            $id_objet = $value['id_objet'];
            $heure_fin = $value['heure_fin'];
            $heure_debut = $value['heure_debut'];
            $etat = $value['etat'];
            $mode = $value['id_mode'];
            $time = explodeTimeInTimestamp(date('c')); // Heure de maintenant


            /**
             * Si l'heure de fin correspond à l'heure de maintenant
             * Si l'état est à off
             * */ 
            if ($time >= $heure_fin) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
              echo "disable";

            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
              echo "disable";
            } else if($time >= $heure_debut) {
              /**
               * Cas où le temps n'est pas fini, l'état n'est pas à off et notre programme doit être activé.
               */
              $updateStateSensor = updateStateSensorData($bdd, $id_objet, $mode);
              $response = updateSendingOfPasserelle($bdd, $id_capteur);
              echo "enable";
            }
          }
        } else {
          $request = updateFirstState($bdd, $id_programme, "off");
          echo "disable";
        }
      }
    break;

    // Vue permettant d'augmenter et diminuer la luminosité à l'aide des boutons
    case 'augmenterValeur':
      if(isset($_POST['value']) and isset($_POST['id_capteur'])) {
        $id_capteur = securitePourXSSFail($_POST['id_capteur']);
        $value = securitePourXSSFail($_POST['value']);
        $request = updateValeur($bdd, $value, $id_capteur);
      }
    break;

    case 'capteurBaton':
    break;

    case 'refreshLight';
      if(isset($_GET['id_capteur'])) {

        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $id_piece = intval(securitePourXSSFail($_GET['id_piece']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c')); // Date d'aujourd'hui
        $time = explodeTimeInTimestamp(date('c')); // Temps d'aujourd'hui
        $id_programme = 0;
        
        /**
         * Le second état représente le check entre l'heure/date du programme comparée à celle de maintenant.
         * Lorsque celles-ci correspondent dans la méthode 'updateSecondeEtat' et 'selectProgrammeNow' alors on passe l'état second
         * à ON.
         */
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second état à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
      
        // Puis on sélectionne tous les programmes avec un état second à ON.
        $programme = selectProgrammeOn($bdd, $id_capteur);
        if(sizeof($programme) != 0) {
          foreach ($programme as $key => $value) {
            $programme_on = $value['id'];
            $id_objet = $value['id_objet'];
            $heure_fin = $value['heure_fin'];
            $heure_debut = $value['heure_debut'];
            $etat = $value['etat'];
            $mode = $value['id_mode'];
            $time = explodeTimeInTimestamp(date('c')); // Heure de maintenant

            /**
             * Si l'heure de fin correspond à l'heure de maintenant
             * Si l'état est à off
             * */ 
            if ($time >= $heure_fin) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($time >= $heure_debut) {
              /**
               * Cas où le temps n'est pas fini, l'état n'est pas à off et notre programme doit être activé.
               */
              $updateStateSensor = updateStateSensorData($bdd, $id_objet, $mode);
            }
          }
        }
      }

    break;

    case 'refreshTemperature':
      if(isset($_GET['id_capteur'])) {

        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $id_piece = intval(securitePourXSSFail($_GET['id_piece']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c')); // Date d'aujourd'hui
        $time = explodeTimeInTimestamp(date('c')); // Temps d'aujourd'hui
        
        // Recupère toutes les données
        $data = getDatasWithGroupUrl();
        sendDataToDatabase($bdd, $data);
  
        $sensor = selectionnerCapteurById($bdd, $id_capteur);
        foreach($sensor as $key => $value) {
          if (strcmp($value['nom'], 'ecotemperature') == 0) {
            $sensor_type = '3';
          }
          $data_recep_passerelle = selectionnerDataOfPasserelle($bdd, $sensor_type);
          foreach($data_recep_passerelle as $key => $value) {
            echo $value['value'];
          }
        }

        $id_programme = 0;
        
        /**
         * Le second état représente le check entre l'heure/date du programme comparée à celle de maintenant.
         * Lorsque celles-ci correspondent dans la méthode 'updateSecondeEtat' et 'selectProgrammeNow' alors on passe l'état second
         * à ON.
         */
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second état à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
      
        // Puis on sélectionne tous les programmes avec un état second à ON.
        $programme = selectProgrammeOn($bdd, $id_capteur);
        if(sizeof($programme) != 0) {
          foreach ($programme as $key => $value) {
            echo "OK";

            $programme_on = $value['id'];
            $id_objet = $value['id_objet'];
            $heure_fin = $value['heure_fin'];
            $etat = $value['etat'];
            $mode = $value['id_mode'];
            $time = explodeTimeInTimestamp(date('c')); // Heure de maintenant

            /**
             * Si l'heure de fin correspond à l'heure de maintenant
             * Si l'état est à off
             * */ 
            if ($time == $heure_fin) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else {
              /**
               * Cas où le temps n'est pas fini, l'état n'est pas à off et notre programme doit être activé.
               */
              $updateStateSensor = updateStateSensorData($bdd, $id_objet, $mode);
            }
          }
        }
      }
    break;

    case 'refreshAutoMode':
      if(isset($_GET['id_capteur'])) {
        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $id_piece = intval(securitePourXSSFail($_GET['id_piece']));

        $data = getDatasWithGroupUrl();
        sendDataToDatabase($bdd, $data);

        $sensor = selectionnerCapteurById($bdd, $id_capteur);

        foreach($sensor as $key => $value) {
          if (strcmp($value['nom'], 'ecolight') == 0) {
            $sensor_type = '5';
          }
          if (strcmp($value['nom'], 'ecotemperature') == 0) {
            $sensor_type = '3';
          }
          $data_recep_passerelle = selectionnerDataOfPasserelle($bdd, $sensor_type);

          foreach($data_recep_passerelle as $key => $value) {
            echo $value['value'];
          }
        }
      }

    break;

    case 'sendDataTemperature':
      $id_capteur = intval(securitePourXSSFail($_POST['id_capteur']));
      $data = selectValueOfCapteur($bdd, $id_capteur);
      foreach($data as $key => $value) {

        $valeurSensor = sprintf('00%s', $value['valeur']);
        $response = sendDataToPasserelle(
          '001D',
          '3',
          '01',
          $valeurSensor,
          date('Y'),
          date('m'),
          date('d'),
          date('H'),
          date('i'),
          date('s')
        );
        // echo $value['valeur'];
      }
      
      
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "erreur404";
}


?>
