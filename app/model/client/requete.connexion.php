<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée


function connexion($email, $mdp, $bdd) {
  $reponse = $bdd->query("SELECT * FROM utilisateur WHERE mail='". $email ."' and mot_de_passe='". $mdp ."'");
  $donnees = $reponse->fetch();
  if($donnees){
      return $donnees;
  }
  $reponse->closeCursor();
  return false;
}

?>
