<?php
include('app/model/requete.generique.php');

// Fonction qui compte le nombre de personnes portant le nom entré
function clientExiste($bdd, $nomClient){
    
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
    }; 
    return $compteur;
}

function listeClient($bdd, $nomClient){
    
    $donnees = $bdd->prepare('SELECT nom, prenom, id
                              FROM utilisateur
                              WHERE nom=:nom');
    $donnees->execute(array(
        'nom' => $nomClient,
    ));
    $allName = $donnees->fetchAll();
    return $allName;
}

function donneesProfil($bdd, $id) {
    
    $reqProfil = $bdd->prepare('SELECT id, nom, prenom, photo, tel_portable, mail 
                                FROM utilisateur 
                                WHERE id = :id');
    $reqProfil->execute(array(
        'id' => $id,
    ));

    return $reqProfil;
}

function logement($bdd, $id) {
    
    $reqLogement = $bdd->prepare('SELECT logement.id, numero, rue, ville, code_postal, complement_adresse 
                                  FROM logement
                                  INNER JOIN utilisateur 
                                  ON logement.id_utilisateur = utilisateur.id
                                  WHERE utilisateur.id = :id
                                  
                                  ');
    $reqLogement->execute(array(
        'id' => $id,
    ));

    return $reqLogement;
}

function donneesLogement($bdd, $idLogement) {
    
    $reqLogement = $bdd->prepare('SELECT id, photo, numero, rue, ville, code_postal, complement_adresse, nbr_habitant, surface, annee_construction
                                FROM logement
                                WHERE id = :id');
    $reqLogement->execute(array(
        'id' => $idLogement,
    ));

    return $reqLogement;
}

function piece($bdd, $id) {
    
    $reqPiece = $bdd->prepare('SELECT piece.id, nom, type
                               FROM piece
                               INNER JOIN logement 
                               ON piece.id_logement = logement.id
                               WHERE logement.id = :id');
    $reqPiece->execute(array(
        'id' => $id,
    ));

    return $reqPiece;
}

function donneesPiece($bdd, $id) {
    
    $reqPiece = $bdd->prepare('SELECT id, nom, surface, etage, type
                                FROM piece
                                WHERE id = :id');
    $reqPiece->execute(array(
        'id' => $id,
    ));

    return $reqPiece;
}

function capteur($bdd, $id) {
    
    $reqCapteur = $bdd->prepare('SELECT objet.id, objet.nom
                                 FROM objet 
                                 INNER JOIN piece 
                                 ON objet.id_piece = piece.id
                                 WHERE piece.id = :id');
    $reqCapteur->execute(array(
        'id' => $id,
    ));

    return $reqCapteur;
}

function donneesCapteur($bdd, $id) {
    
    $reqCapteur = $bdd->prepare('SELECT id, nom, surface, etage, id_type_objet
                                FROM piece
                                WHERE id = :id');
    $reqCapteur->execute(array(
        'id' => $id,
    ));

    return $reqCapteur;
}