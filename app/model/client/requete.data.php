<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

function selectValueOfCapteur($bdd, $id_capteur) {
  $objetId = $id_capteur;
  $query = 'SELECT valeur FROM information where id_objet=:objetId ORDER BY date DESC LIMIT 0 , 1 ';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":objetId", $objetId);
  $donnees->execute();
  return $donnees->fetchAll();
}

function insererNouvelleValeur($bdd, $value, $id_capteur) {
    $id_objet = $id_capteur;
    // Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
    $date = date('c');

    $query = 'INSERT INTO information(
      date,
      valeur,
      id_objet
    ) VALUES (
      :date,
      :valeur,
      :id_objet
    )';

    $donnees = $bdd->prepare($query);

    $donnees->bindParam(":date", $date);
    $donnees->bindParam(":valeur", $value);
    $donnees->bindParam(":id_objet", $id_objet);

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
  $query = 'SELECT * FROM mode
            INNER JOIN programmationhoraire ON mode.id = programmationhoraire.id_mode
            WHERE programmationhoraire.date=:date_now
            AND programmationhoraire.heure_debut=:heure_debut
            AND programmationhoraire.id_objet=:id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":date_now", $date);
  $donnees->bindParam(":heure_debut", $time);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->execute();
  return $donnees->fetchAll();

}

function selectProgrammeOn($bdd, $id_capteur) {
  $etat = "on";
  $query = 'SELECT * FROM mode
            INNER JOIN programmationhoraire ON mode.id = programmationhoraire.id_mode
            WHERE programmationhoraire.etat_second=:etat
            AND programmationhoraire.id_objet=:id_capteur';
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
?>
