<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

$table = 'mentionsLegales';

function selectionnerMentionsLegales($bdd) {
	$query = 'SELECT message FROM mentionsLegales ORDER BY `id` DESC LIMIT 1'; /* Affiche le dernier message enregistré */
	$donnees = $bdd->prepare($query);
  	$donnees->execute();
  	return $donnees->fetchAll();
}

function insererMentionsLegales($bdd, $mentionsLegales) {


	$query = 'INSERT INTO mentionsLegales(message) VALUES (:message)';
	$donnees = $bdd->prepare($query);

	$donnees->bindParam(":message", addslashes($mentionsLegales['message']));
	$request = $donnees->execute();
  	return $request;
}







?>
