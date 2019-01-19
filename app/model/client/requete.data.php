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
    $date = "2019-11-02";
    $time = "10:22:22";

    $query = 'INSERT INTO information(
      date,
      heure,
      valeur,
      id_objet
    ) VALUES (
      :date,
      :heure,
      :valeur,
      :id_objet
    )';

    $donnees = $bdd->prepare($query);

    $donnees->bindParam(":date", $date);
    $donnees->bindParam(":heure", $time);
    $donnees->bindParam(":valeur", $value);
    $donnees->bindParam(":id_objet", $id_objet);

    $request = $donnees->execute();
    return $request;
}

?>
