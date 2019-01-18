<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'faq';

function selectionnerFAQ($bdd) {
	$utilisateurId=3;
	//$query = 'SELECT type, question, reponse FROM faq ';
	$query = 'SELECT question, reponse FROM faq INNER JOIN utilisateur ON utilisateur.id = faq.id_utilisateur WHERE utilisateur.id = 3';
	$donnees = $bdd->prepare($query);
  	//$donnees->bindParam(":utilisateurId", $utilisateurId);
  	$donnees->execute();
  	return $donnees->fetchAll();
}

function insererFAQ($bdd, $faq) {
	

	$query = 'INSERT INTO faq(type, question, reponse, id_utilisateur) VALUES (:type, :question, :reponse, :id_utilisateur)';
	$donnees = $bdd->prepare($query);
	
	$donnees->bindParam(":type", $faq['type']);
	$donnees->bindParam(":question", $faq['question']);
	$donnees->bindParam(":reponse", $faq['reponse']);
	$donnees->bindParam(":id_utilisateur", $faq['id_utilisateur']);
	$request = $donnees->execute();
  	return $request;
}







?>