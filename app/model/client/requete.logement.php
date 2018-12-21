<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'logement';

/*@Todo: Attendre la connexion/inscription utilisateur et passer une variable de SESSION ici*/

// Fonction permettant de sélectionner tous les logements d'un utilisateur
function selectionerLogement($bdd) {
  $utilisateurId = 1;
  $query = 'SELECT
      numero,
      rue,
      ville,
      code_postal,
      complement_adresse,
      nbr_habitant,
      surface,
      annee_construction
    FROM logement
    WHERE id_utilisateur = :utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  return $donnees->fetchAll();
}

// Fonction permettant d'insérer un logement pour un utilisateur
function insererNouveauLogement($bdd, $logement) {

  $query = 'INSERT INTO logement(
    numero,
    rue,
    ville,
    code_postal,
    nbr_habitant,
    surface,
    annee_construction,

  ) VALUES (
    :numero,
    :rue,
    :ville,
    :code_postal,
    :nbr_habitant,
    :surface,
    :annee_construction,
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":numero", $logement['numero']);
  $donnees->bindParam(":rue", $logement['rue']);
  $donnees->bindParam(":ville", $logement['ville']);
  $donnees->bindParam(":pays", $logement['pays']);
  $donnees->bindParam(":code_postal", $logement['code_postal']);
  $donnees->bindParam(":nbr_habitant", $logement['nbr_habitant']);
  $donnees->bindParam(":surface", $logement['surface']);
  $donnees->bindParam(":annee_construction", $logement['annee_construction']);

  $request = $donnees->execute();

}

// Fonction permettant de supprimer un logement
function supprimerLogement($bdd, $logement) {
  $queryVerif = 'SELECT codePostal FROM logement WHERE logement.id = :logementId';
  $donnéesVerif = $bdd->prepare($queryVerif);
  $donnéesVerif->bindParam(":logementId", $logement['id']);
  $donneesVerif->execute();
  $codePostal = $donneesVerif->fetchAll();

  if($donneesVerif) {
    if($codePostal == $logement['codePostal']) {
      $query = 'DELETE FROM logement WHERE logement.id = :logementId';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":logementId", $logement['id']);
      return $donnees->execute();
    } else {
      return false;
    }
  } else {
    return false;
  }
}
?>
