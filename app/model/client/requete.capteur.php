<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

<<<<<<< HEAD
$table = 'logement';


function selectionerCapteur($bdd, $pieceId) {
  $capteur = $bdd->query('SELECT * FROM objet o
                          INNER JOIN piece p ON o.id_piece = p.id
                          WHERE p.id = '.$pieceId.'
                          ');


  return $capteur ;

}

function infoPiece($bdd, $pieceId){
  $piece = $bdd->query('SELECT * FROM piece p
  											WHERE p.id = '.$pieceId.'
  											');
  $donneespiece = $piece->fetch();
  return $donneespiece;
}
=======
// Fonction permettant de sélectionner toutes les ambiances d'un objet
function selectionnerAmbiance($bdd) {
  $utilisateurId = 1;
  $query = 'SELECT
      *
    FROM mode
    WHERE id_utilisateur = :utilisateurId';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":utilisateurId", $utilisateurId);
  $donnees->execute();
  return $donnees->fetchAll();
}

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

function selectionnerProgramme($bdd) {
  $id_objet = 1;
  $query = 'SELECT
      *
    FROM programmationhoraire
    WHERE id_objet = :idObjet';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":idObjet", $id_objet);
  $donnees->execute();
  return $donnees->fetchAll();
}

function insererNouveauProgramme($bdd, $values) {
  $id_objet = 1;

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
  $donnees->bindParam(":id_objet", $id_objet);
  $donnees->bindParam(":id_mode", $values['ambiance']);

  $request = $donnees->execute();
  return $request;
}

function supprimerProgramme($bdd, $value) {
  $query = 'DELETE FROM programmationhoraire WHERE id = :programme_id';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":programme_id", $value['id_programme']);
  return $donnees->execute();
}

function activeProgramme($bdd, $value) {
  $query = 'UPDATE programmationhoraire SET etat=:check_programme WHERE id= :id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_programme", $value['id_programme']);
  $donnees->bindParam(":check_programme", $value['on_programme']);
  return $donnees->execute();
}

function desactiveProgramme($bdd, $value) {
  $query = 'UPDATE programmationhoraire SET etat=:check_programme WHERE id= :id_programme';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_programme", $value['id_programme']);
  $donnees->bindParam(":check_programme", $value['off_programme']);
  return $donnees->execute();
}
?>
>>>>>>> dev
