<?php
include("app/model/requete.generique.php"); // On connecte la base de donnée

/**
* Fonction permettant de sélectionner un employé
**/
function selectionnerEmployers($bdd)  {
  $type_user= "utilisateur";
  $type_admin="administrateur";
  $query = "SELECT * FROM utilisateur WHERE type != :type_user AND type != :type_admin";
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":type_user", $type_user);
  $donnees->bindParam(":type_admin", $type_admin);
  $donnees->execute();
  return $donnees->fetchAll();
}

/**
* Fonction permettant d'inscrire un employé
**/
function inscrireEmployers($bdd, $value) {
  $stmt = $bdd->prepare('INSERT INTO `utilisateur`
    ( `nom`,
      `prenom`,
      `mail`,
      `mot_de_passe`,
      `type`)
      VALUES(
        :nom,
        :prenom,
        :mail,
        :mot_de_passe,
        :type
      )');
   $stmt->bindParam(':nom', $value['nom']);
   $stmt->bindParam(':prenom', $value['prenom']);
   $stmt->bindParam(':mail', $value['mail']);
   $stmt->bindParam(':mot_de_passe', $value['password']);
   $stmt->bindParam(':type', $value['type']);

   return $stmt->execute();
}

/**
* Fonction permettant de supprimer un employé
**/
function supprimerEmployers($bdd, $id_user) {
  $query = 'DELETE FROM utilisateur WHERE id = :id_user';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_user", $id_user);
  return $donnees->execute();
}

?>
