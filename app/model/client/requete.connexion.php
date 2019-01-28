<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée


function connexion($email, $mdp, $bdd) {
  $query = 'SELECT * FROM utilisateur WHERE mail =:email and mot_de_passe=:mdp';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":email", $email);
  $donnees->bindParam(":mdp", $mdp);
  $donnees->execute();
  return $donnees->fetchAll();
}

function passwordForget($bdd, $email) {
  $query = 'SELECT mail, mot_de_passe FROM utilisateur WHERE mail =:email';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":email", $email);
  $donnees->execute();
  return $donnees->fetchAll();
}

function selectionnerMdp($bdd, $values) {
  $query = 'SELECT mot_de_passe FROM utilisateur
            WHERE nom =:nom and
                  prenom=:prenom and
                  question_securite=:question_securite and
                  reponse_securite=:reponse_securite';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":prenom", $values['prenom']);
  $donnees->bindParam(":nom", $values['nom']);
  $donnees->bindParam(":question_securite", $values['question_securite']);
  $donnees->bindParam(":reponse_securite", $values['reponse_securite']);
  $donnees->execute();
  return $donnees->fetchAll();
}

?>
