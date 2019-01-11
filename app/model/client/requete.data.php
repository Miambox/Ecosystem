<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

function selectValueOfCapteur($bdd) {
  $utilisateurId = 1;
  $objetId = 1;
  $query = 'SELECT valeur FROM information
    INNER JOIN logement ON logement.id_utilisateur = :utilisateurId
    INNER JOIN piece ON logement.id = piece.id_logement
    INNER JOIN objet ON piece.id = objet.id_piece
    WHERE objet.id = :objetId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->bindParam(":objetId", $objetId);
  $donnees->execute();
  return $donnees->fetchAll();
}

?>
