<?php


function selectValueOfCapteur($bdd, $id_capteur) {
  $objetId = $id_capteur;
  $query = 'SELECT valeur FROM information where id_objet=:objetId ORDER BY date DESC LIMIT 0 , 1 ';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":objetId", $objetId);
  $donnees->execute();
  return $donnees->fetchAll();
}

function insererNouvelleValeur($bdd, $id_capteur, $value) {

    $query = 'INSERT INTO refresh_temperature(
      id_objet,
      valeur,
    ) VALUES (
      :id_objet,
      :valeur,
    )';

    $donnees = $bdd->prepare($query);

    $donnees->bindParam(":id_objet", $id_capteur);
    $donnees->bindParam(":valeur", $value);

    $request = $donnees->execute();
    return $request;
}

function selectEtatOfCapteur($bdd, $id_capteur) {
  $query = 'SELECT etat FROM objet where id=:id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->execute();
  return $donnees->fetchAll();

}

function updateValeur($bdd, $valeur, $id_capteur) {
  $query = 'UPDATE information SET  valeur=:valeur WHERE id_objet= :id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->bindParam(":valeur", $valeur);
  return $donnees->execute();
}

function selectProgrammeNow($bdd, $id_capteur, $date, $time) {
  // $query = 'SELECT * FROM mode
  //           INNER JOIN programmationhoraire ON mode.id = programmationhoraire.id_mode
  //           WHERE programmationhoraire.date=:date_now
  //           AND programmationhoraire.heure_debut=:heure_debut
  //           AND programmationhoraire.id_objet=:id_capteur';
  $query = 'SELECT * FROM programmationhoraire WHERE 
    date=:date_now AND 
    heure_debut=:heure_debut AND
    id_objet=:id_capteur'; 

  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":date_now", $date);
  $donnees->bindParam(":heure_debut", $time);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->execute();
  return $donnees->fetchAll();

}

function selectProgrammeOn($bdd, $id_capteur) {
  $etat = "on";
  // $query = 'SELECT * FROM mode
  //           INNER JOIN programmationhoraire ON mode.id = programmationhoraire.id_mode
  //           WHERE programmationhoraire.etat_second=:etat
  //           AND programmationhoraire.id_objet=:id_capteur';

  $query = 'SELECT * FROM programmationhoraire WHERE etat_second=:etat AND id_objet=:id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->bindParam(":etat", $etat);
  $donnees->execute();
  return $donnees->fetchAll();
}

function updateSecondEtat($bdd, $id_programme, $etat) {
  $query = 'UPDATE programmationhoraire SET etat_second=:etat WHERE id=:id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":etat", $etat);
  $donnees->bindParam(":id_programme", $id_programme);
  return $donnees->execute();
}

function updateStateSensorData($bdd, $id_objet, $mode) {
  $query = 'UPDATE objet SET etat=:mode WHERE id=:id_objet';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":mode", $mode);
  $donnees->bindParam(":id_objet", $id_objet);
  return $donnees->execute();
}

function selectSecondEtat($bdd, $id_programme) {
  $query = 'SELECT etat_second FROM programmationhoraire where id=:id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_programme", $id_programme);
  $donnees->execute();
  return $donnees->fetchAll();
}

// Initialise la luminosité à 0
function initLumValue() {
  return json_encode(
    array(
      "dataPourcent"=> [
        ["Utilise", 0],
        ["Non-utilise", 100]
      ],
    )
  );
}

// Donne une valeur à la luminosité
function updateLumValue($value) {
  return json_encode(
    array(
      "dataPourcent"=> [
        ["Utilise", intval($value)],
        ["Non-utilise", 100-$value]
      ],
    )
  );
}

function updateLightValue($value) {
  return json_encode(
    array(
      "dataPourcent"=> [
        ["Utilise", intval($value)],
        ["Non-utilise", 100-$value],
      ]
    )
  );
}

/**
 * Sélectionner la dernière données reçues
 */
function selectionnerDataOfPasserelle($bdd, $sensor_type) {
  $query = 'SELECT MAX(date_time) FROM trame_recep WHERE sensor_type = :sensor_type';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":sensor_type", $sensor_type);
  $donnees->execute();
  $max_date_array = $donnees->fetch();
  $max_date = $max_date_array[0];
  $new_query = 'SELECT * FROM trame_recep WHERE sensor_type = :sensor_type AND date_time=:date_time';
  $new_donnees = $bdd->prepare($new_query);
  $new_donnees->bindParam(":sensor_type", $sensor_type);
  $new_donnees->bindParam(":date_time", $max_date);
  $new_donnees->execute();
  return $new_donnees->fetchAll();
}
?>
