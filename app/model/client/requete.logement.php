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
      pays,
      codePostal,
      complementAdresse,
      nbrHabitant,
      surface,
      anneeConstruction,
      diagnostiqueE FROM logement
    INNER JOIN partagelogement ON (logement.id = partagelogement.id_logement)
    INNER JOIN utilisateur ON (partagelogement.id_utilisateur = utilisateur.id)
    WHERE utilisateur.id = :utilisateurId';
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
    pays,
    codePostal,
    nbrHabitant,
    surface,
    anneeConstruction,
    diagnostiqueE
  ) VALUES (
    :numero,
    :rue,
    :ville,
    :pays,
    :codePostal,
    :nbrHabitant,
    :surface,
    :anneeConstruction,
    :diagnostiqueE
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":numero", $logement['numero']);
  $donnees->bindParam(":rue", $logement['rue']);
  $donnees->bindParam(":ville", $logement['ville']);
  $donnees->bindParam(":pays", $logement['pays']);
  $donnees->bindParam(":codePostal", $logement['codePostal']);
  $donnees->bindParam(":nbrHabitant", $logement['nbrHabitant']);
  $donnees->bindParam(":surface", $logement['surface']);
  $donnees->bindParam(":anneeConstruction", $logement['anneeConstruction']);
  $donnees->bindParam(":diagnostiqueE", $logement['diagnostiqueE']);

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
