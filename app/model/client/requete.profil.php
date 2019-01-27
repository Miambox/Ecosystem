<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

function selectionnerLogementWhichShare($bdd) {
  $id_utilisateur = $_SESSION['id'];
  $query = 'SELECT DISTINCT id_logement, numero, rue, ville, code_postal FROM logement
            INNER JOIN partagelogement
            ON logement.id = partagelogement.id_logement
            WHERE logement.id_utilisateur=:id_utilisateur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_utilisateur", $id_utilisateur);
  $donnees->execute();
  return $donnees->fetchAll();
}

function selectionnerUserWithLogementShare($bdd, $id_logement) {
  $query = 'SELECT * FROM utilisateur
            INNER JOIN partagelogement
            ON utilisateur.id = partagelogement.id_utilisateur
            WHERE partagelogement.id_logement =:id_logement';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_logement", $id_logement);
  $donnees->execute();
  return $donnees->fetchAll();
}

function supprimerPartage($bdd, $id_user) {
  $query = 'DELETE FROM partagelogement WHERE id_utilisateur = :id_user';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_user", $id_user);
  return $donnees->execute();
}

function selectionnerInformationUserById($bdd) {
  $id_user = $_SESSION['id'];
  $query = 'SELECT * FROM utilisateur
            WHERE id =:id_utilisateur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_utilisateur", $id_user);
  $donnees->execute();
  return $donnees->fetchAll();
}

function updaterProfil($bdd, $value) {
  $id_utilisateur = $_SESSION['id'];
  $query = 'UPDATE utilisateur SET
            nom =:nom,
            prenom                 =:prenom,
            date_naissance               =:date_naissance,
            mail         =:mail,
            tel_portable        =:tel_portable,
            mot_de_passe  =:mot_de_passe
            WHERE id   =:id_utilisateur';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_utilisateur", $id_utilisateur);
  $donnees->bindParam(":nom", $value['nom']);
  $donnees->bindParam(":prenom", $value['prenom']);
  $donnees->bindParam(":date_naissance", $value['date_naissance']);
  $donnees->bindParam(":mail", $value['mail']);
  $donnees->bindParam(":tel_portable", $value['tel_portable']);
  $donnees->bindParam(":mot_de_passe", $value['mot_de_passe']);
  return $donnees->execute();
}
?>
