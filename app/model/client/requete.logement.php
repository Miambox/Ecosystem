<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'logement';

/*@Todo: Attendre la connexion/inscription utilisateur et passer une variable de SESSION ici*/

// Fonction permettant de sélectionner tous les logements d'un utilisateur
function selectionerLogement($bdd) {
  $utilisateurId = 2;
  $query = 'SELECT * FROM logement
            INNER JOIN partagelogement
            ON logement.id = partagelogement.id_logement
            AND partagelogement.id_utilisateur = :utilisateurId
            OR logement.id_utilisateur = :utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  return $donnees->fetchAll();
}

// Fonction permettant d'insérer un logement pour un utilisateur
function insererNouveauLogement($bdd, $logement) {

  $id_utilisateur = 1;

  $query = 'INSERT INTO logement(
    numero,
    rue,
    ville,
    code_postal,
    nbr_habitant,
    surface,
    annee_construction,
    id_utilisateur
  ) VALUES (
    :numero,
    :rue,
    :ville,
    :code_postal,
    :nbr_habitant,
    :surface,
    :annee_construction,
    :id_utilisateur
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":numero", $logement['numero']);
  $donnees->bindParam(":rue", $logement['rue']);
  $donnees->bindParam(":ville", $logement['ville']);
  $donnees->bindParam(":code_postal", $logement['code_postal']);
  $donnees->bindParam(":nbr_habitant", $logement['nbr_habitant']);
  $donnees->bindParam(":surface", $logement['surface']);
  $donnees->bindParam(":annee_construction", $logement['annee_construction']);
  $donnees->bindParam(":id_utilisateur", $id_utilisateur);

  $request = $donnees->execute();
  return $request;
}

// Fonction permettant de supprimer un logement
function supprimerLogement($bdd, $logement) {
  $queryVerif = 'SELECT code_postal FROM logement WHERE logement.id = :logement_id';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->bindParam(":logement_id", $logement['id']);
  $donneesVerif->execute();
  $response = $donneesVerif->fetchAll();
  foreach ($response as $key => $value) {
    $code_postal = $value['code_postal'];
  }
  if($donneesVerif) {
    var_dump($code_postal);
    var_dump($logement['code_postal']);
    if($code_postal == $logement['code_postal']) {
      $query = 'DELETE FROM logement WHERE logement.id = :logement_id';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":logement_id", $logement['id']);
      return $donnees->execute();
    } else {
      return false;
    }
  } else {
    return false;
  }
}
?>
