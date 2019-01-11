<?php

// Fonction qui compte le nombre de personnes portant le nom entré
function clientExiste($nomClient){
    $bdd = new PDO('mysql:host=localhost; dbname=ecosystem; charset=utf8','root','root');
    $donnees = $bdd->prepare('SELECT nom
                              FROM utilisateur 
                              WHERE nom=:nom');
    $donnees->execute(array(
        'nom' => $nomClient,
    ));
    $compteur = 0;
    while($client = $donnees->fetch()) {
        if(strcasecmp($client['nom'], $nomClient) == 0) {
            $compteur++;
        }
    }; // fetch() retourne un array
    return $compteur;
}

function listeClient($nomClient){
    $bdd = new PDO('mysql:host=localhost; dbname=ecosystem; charset=utf8','root','root');
    $donnees = $bdd->prepare('SELECT nom, prenom, id
                              FROM utilisateur
                              WHERE nom=:nom');
    $donnees->execute(array(
        'nom' => $nomClient,
    ));
    return $donnees;
}

function donneesProfil($id) {
    $reqProfil = $bdd->prepare('SELECT nom, prenom, photo, tel_portable, mail 
                                FROM utilisateur 
                                WHERE id = :id');
    $reqProfil->execute(array(
        'id' => $id,
    ));

    $donneesProfil = $reqProfil->fetch();
}

function donneesLogement($id) {
    $reqLogement = $bdd->prepare('SELECT photo, numero, rue, ville, code_postal, complement_adresse, nbr_habitant, surface, annee_construction 
                                  FROM logement
                                  INNER JOIN utilisateur 
                                  ON utilisateur.idLogement = :id');
    $reqLogement->execute(array(
        'id' => $id,
    ));

    $donneesLogement = $reqLogement->fetch();
}

function donneesPiece($id) {
    $reqPiece = $bdd->prepare('SELECT nom, surface, etage, type
                               FROM piece
                               INNER JOIN logement 
                               ON logement.idPiece = :id');
    $reqPiece->execute(array(
        'id' => $id,
    ));

    $donneesPiece = $reqPiece->fetch();
}

function donneesCapteur() {
    $reqCapteur = $bdd->prepare('SELECT nom, surface, etage, type
                                 FROM objet 
                                 INNER JOIN piece 
                                 ON piece.idObjet = :id');
    $reqCapteur->execute(array(
        'id' => $id,
    ));

    $donneesCapteur = $reqCapteur->fetch();
}