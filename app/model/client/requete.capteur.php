<?php

include("app/model/requete.generique.php"); // On connecte la base de donnée

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
