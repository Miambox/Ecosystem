<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'logement';

/**
* Fonction permettant de sélectionner un capteur
**/
function selectionerCapteur($bdd, $pieceId) {
  $capteur = $bdd->query('SELECT * FROM objet o
                          WHERE o.id_piece = '.$pieceId.'
                          ');


  return $capteur ;
}

function selectionnerCapteurById($bdd, $id_capteur) {
  $query = 'SELECT
      *
    FROM objet
    WHERE id= :id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->execute();
  return $donnees->fetchAll();
}

function infoCapteur($bdd, $id) {
  $capteur = $bdd->query('SELECT * FROM objet o
                          WHERE o.id = '.$id.'
                          ');
  $donnees = $capteur->fetch();
  return $donnees ;
}

function infoPiece($bdd, $pieceId){
  $piece = $bdd->query('SELECT * FROM piece p
  											WHERE p.id = '.$pieceId.'
  											');
  $donneespiece = $piece->fetch();
  return $donneespiece;
}

function etatCapteur($bdd, $id_capteur) {
  $query = 'SELECT etat FROM objet WHERE id =:id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant d'updater l'état d'un capteur
**/
function updateStateSensor($bdd, $value) {
  $query = 'UPDATE objet SET etat=:check_capteur WHERE id= :id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $value['id_capteur']);
  $donnees->bindParam(":check_capteur", $value['state']);
  return $donnees->execute();
}

/**
* Fonction permettant d'insérer un nouveau capteur
**/
function insererNouveauCapteur($bdd, $capteur) {

  $query = 'INSERT INTO objet(
    numero_ref,
    nom,
    id_piece
  ) VALUES (
    :numero_ref,
    :nom,
    :id_piece
  )';

  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":numero_ref", $capteur['numero_ref']);
  $donnees->bindParam(":nom", $capteur['nom']);
  $donnees->bindParam(":id_piece", $capteur['id_piece']);

  $request = $donnees->execute();
  return $request;
}

function updaterCapteur($bdd, $id_capteur, $value) {
  $query = 'UPDATE objet SET
            nom =:nom,
            numero_ref =:numero_ref
            WHERE id=:id_capteur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_capteur", $id_capteur);
  $donnees->bindParam(":nom", $value['nom']);
  $donnees->bindParam(":numero_ref", $value['numero_ref']);
  return $donnees->execute();
}

// *********************************LES AMBIANCES************************************************
/**
* Fonction permettant de sélectionner toutes les ambiances d'un utilisateur
**/
function selectionnerAmbiance($bdd) {
  $utilisateurId = $_SESSION['id'];
  $query = 'SELECT
      *
    FROM mode
    WHERE id_utilisateur = :utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant de selectionner une a
**/
function selectionnerAmbianceParId($bdd, $ambianceId) {
  $query = 'SELECT
      nom
    FROM mode
    WHERE id = :ambianceId';

  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":ambianceId", $ambianceId);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant d'inserer une nouvelle ambiance
**/
function insererNouvelleAmbiance($bdd, $value) {
  $id_utilisateur = $_SESSION['id'];

  $query = 'INSERT INTO mode(
    nom,
    valeur,
    id_utilisateur
  ) VALUES (
    :nom,
    :valeur,
    :id_utilisateur
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":nom", $value['nom']);
  $donnees->bindParam(":valeur", $value['valeur']);
  $donnees->bindParam(":id_utilisateur", $id_utilisateur);
  $request = $donnees->execute();
  return $request;

}

/**
* Fonction permettant de supprimer un ambiance
**/
function supprimerAmbiance($bdd,$id_ambiance) {
  $query = 'DELETE FROM mode WHERE id = :id_ambiance';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_ambiance", $id_ambiance);
  return $donnees->execute();
}

// **************************************************************************************************


// *********************************LES PROGRAMMES************************************************
/**
* Permet de sélectionner les programmes ajoutés
**/
function selectionnerProgramme($bdd, $idObjet) {
  $id_objet = $idObjet;

  $query = 'SELECT
      *
    FROM programmationhoraire
    WHERE id_objet = :idObjet';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":idObjet", $id_objet);
  $donnees->execute();
  return $donnees->fetchAll();
}
/**
* Fonction permettant d'insérer un nouveau programme
**/
function insererNouveauProgramme($bdd, $values, $id_capteur) {

  $query = 'INSERT INTO programmationhoraire(
    date,
    heure_debut,
    heure_fin,
    id_objet,
    id_mode
  ) VALUES (
    :date,
    :heure_debut,
    :heure_fin,
    :id_objet,
    :id_mode
  )';

  $donnees = $bdd->prepare($query);

  $donnees->bindParam(":date", $values['date']);
  $donnees->bindParam(":heure_debut", $values['heure_debut']);
  $donnees->bindParam(":heure_fin", $values['heure_fin']);
  $donnees->bindParam(":id_objet", intval($id_capteur));
  $donnees->bindParam(":id_mode", $values['ambiance']);

  $request = $donnees->execute();
  return $request;
}

/**
* Fonction permettant de supprimer un programme
**/
function supprimerProgramme($bdd, $value) {
  $query = 'DELETE FROM programmationhoraire WHERE id = :programme_id';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":programme_id", $value['id_programme']);
  return $donnees->execute();
}

/**
* Fonction permettant d'activer un nouveau programme
**/
function activeProgramme($bdd, $value) {
  $query = 'UPDATE programmationhoraire SET etat=:check_programme WHERE id= :id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_programme", $value['id_programme']);
  $donnees->bindParam(":check_programme", $value['on_programme']);
  return $donnees->execute();
}

/**
* Fonction permettant de désactiver un programme
**/
function desactiveProgramme($bdd, $value) {
  $query = 'UPDATE programmationhoraire SET etat=:check_programme WHERE id= :id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_programme", $value['id_programme']);
  $donnees->bindParam(":check_programme", $value['off_programme']);
  return $donnees->execute();
}

/**
 * Fonction permettant d'envoyer tout les types existants
 */
function getSensorType($bdd) {
  $queryVerif = 'SELECT type FROM sensor_type';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->execute();
  $response = $donneesVerif->fetchAll();
  return $response;
}

function getSensorTypeById($bdd, $id_sensor) {
  $queryVerif = 'SELECT nom FROM objet WHERE id=:sensor_id';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->bindParam(":sensor_id", $id_sensor);
  $donneesVerif->execute();
  $response = $donneesVerif->fetch();
  return $response;
}

/**
 * Fonction permettant de supprimer le capteur
 */
function supprimerCapteur($bdd, $capteur) {
  $queryVerif = 'SELECT nom FROM objet WHERE objet.id = :id_capteur';
  $donneesVerif = $bdd->prepare($queryVerif);
  $donneesVerif->bindParam(":id_capteur", $capteur['id']);
  $donneesVerif->execute();
  $response = $donneesVerif->fetchAll();
  foreach ($response as $key => $value) {
    $nom = $value['nom'];
  }
  if($donneesVerif) {
    if($nom == $capteur['nom']) {
      $query = 'DELETE FROM objet WHERE objet.id = :id_capteur';
      $donnees = $bdd->prepare($query);
      $donnees->bindParam(":id_capteur", $capteur['id']);
      return $donnees->execute();
    } else {
      return false;
    }
  } else {
    return false;
  }
}

?>
