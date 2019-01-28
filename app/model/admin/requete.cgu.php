<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'cgu';

function selectionnerCGU($bdd) {
	$query = 'SELECT message FROM cgu ORDER BY `id` DESC LIMIT 1'; /* Affiche le dernier message enregistré */
	$donnees = $bdd->prepare($query);
  	$donnees->execute();
  	return $donnees->fetchAll();
}

function insererCGU($bdd, $cgu) {


	$query = 'INSERT INTO cgu(message) VALUES (:message)';
	$donnees = $bdd->prepare($query);

	$donnees->bindParam(":message", $cgu['message']);
	$request = $donnees->execute();
  	return $request;
}







?>