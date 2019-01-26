<?php
include("app/model/requete.generique.php"); // On connecte la base de donnée

/**
* Fonction permettant de selectioner les pièces
**/
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

function selectionnerIDLogementBYPieceId($bdd, $id_piece) {
  $query = 'SELECT
      *
    FROM piece
    WHERE id = :id_piece';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_piece", $id_piece);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant de selectionner les informations du logement
**/
function informationLogement($bdd, $id_logement) {
  $query = 'SELECT * FROM logement WHERE id=:id_logement';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_logement", $id_logement);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant d'ajouter une nouvelle pièce
**/
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

/**
* Fonction permettant de supprimer une piece
**/
function supprimerPiece($bdd, $piece) {
  $queryVerif = 'SELECT type FROM piece WHERE piece.id = :id_piece';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->bindParam(":id_piece", $piece['id']);
  $donneesVerif->execute();
  $response = $donneesVerif->fetchAll();
  foreach ($response as $key => $value) {
    $type = $value['type'];
  }
  if($donneesVerif) {
    var_dump($type);
    var_dump($piece['type']);
    var_dump($type == $piece['type']);
    if($type == $piece['type']) {
      $query = 'DELETE FROM piece WHERE piece.id = :id_piece';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":id_piece", $piece['id']);
      return $donnees->execute();
    } else {
      return false;
    }
  } else {
    return false;
  }
}

?>
