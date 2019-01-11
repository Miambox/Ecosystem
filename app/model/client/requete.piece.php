<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

function selectionnerPiece($bdd, $id_logement) {
  $query = 'SELECT
      *
    FROM piece
    WHERE id_logement = :id_logement';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_logement", $id_logement);
  $donnees->execute();
  return $donnees->fetchAll();
}


function insererNouvellePiece($bdd, $value, $id_logement) {

  $query = 'INSERT INTO piece(
    nom,
    type,
    surface,
    etage,
    id_logement
  ) VALUES (
    :nom,
    :type,
    :surface,
    :etage,
    :id_logement
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":nom", $value['nom']);
  $donnees->bindParam(":type", $value['type']);
  $donnees->bindParam(":surface", $value['surface']);
  $donnees->bindParam(":etage", $value['etage']);
  $donnees->bindParam(":id_logement", $id_logement);

  $request = $donnees->execute();
  return $request;
}

?>
