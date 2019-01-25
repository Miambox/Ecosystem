<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'faq';

function selectionnerFAQ($bdd) {
	$utilisateurId=3;
	//$query = 'SELECT type, question, reponse FROM faq ';
	$query = 'SELECT * FROM faq';
	$donnees = $bdd->prepare($query);
  	//$donnees->bindParam(":utilisateurId", $utilisateurId);
  	$donnees->execute();
  	return $donnees->fetchAll();
}

function insererFAQ($bdd, $faq) {
	$id_utilisateur = $_SESSION['id'];

	$query = 'INSERT INTO faq(question, reponse, id_utilisateur) VALUES (:question, :reponse, :id_utilisateur)';
	$donnees = $bdd->prepare($query);

	$donnees->bindParam(":question", $faq['question']);
	$donnees->bindParam(":reponse", $faq['reponse']);
	$donnees->bindParam(":id_utilisateur", $id_utilisateur);
	$request = $donnees->execute();
  	return $request;
}

function selectionnerFAQByID($bdd, $id_faq) {
	$query = 'SELECT * FROM faq WHERE id=:id_faq';
	$donnees = $bdd->prepare($query);
  	$donnees->bindParam(":id_faq", $id_faq);
  $donnees->execute();
  return $donnees->fetchAll();

}

function updateFAQ($bdd, $id_faq, $faq) {
	$query = 'UPDATE faq SET question=:question, reponse=:reponse WHERE id=:id_faq';
  $donnees = $bdd->prepare($query);
  $donnees->bindParam(":id_faq", $id_faq);
	$donnees->bindParam(":question", $faq['question']);
  $donnees->bindParam(":reponse", $faq['reponse']);
  return $donnees->execute();
}

function supprimerFaq($bdd, $id_faq) {
	$query = 'DELETE FROM faq WHERE id = :id_faq';
  $donnees = $bdd->prepare($query);
	$donnees->bindParam(":id_faq", $id_faq);
	return $donnees->execute();
}







?>
