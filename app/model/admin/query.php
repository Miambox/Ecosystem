<?php
$bdd = new PDO('mysql:host=localhost; dbname=ecosystem; charset=utf8','root','root');
$donnees = $bdd->query('SELECT nom
                        FROM utilisateur');
$allName = array();
while($name = $donnees->fetch()) {
    $nomClient = array($name['nom']);
    array_push($allName,$nomClient[0]);
}

// array_unique supprime tous les valeurs en doublons dans un tableau
$allNameOnce = array_unique($allName);

// Bizarrement, $allNameOnce ne s'affiche pas correctement
// On va copier tous les valeurs de *allNameOnce dans un tableau $arrayNom
$arrayNom = array();
foreach($allNameOnce as $nom){
    $arrayNom[] = $nom;
}

$myJSON = json_encode($arrayNom);

echo $myJSON;
?>