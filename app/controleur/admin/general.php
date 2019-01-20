<?php
// Connexion a la base de donnees
include('app/model/admin/general.php');

switch ($action) {

    case 'general':
        $vue = "general";
        $title = "Accueil";
        break;

    case 'listeClient':
        $vue = "listeClient";
        $title = "Liste des clients";

        // Nom entre dans la barre de recherche
        $nomClient = $_POST['nomClient'];
        
        // Fonction de app/model/admin/general.php

        if(clientExiste($bdd, $nomClient)!=0) {
            $affiche = 'oui';
        }
        else {
            $affiche = 'non';
        }
        
        break;

    case 'deleteUser':
        $vue = 'deleteUser';
        $title = 'Supprimer un client';
        $mdp = $_POST['mdp-admin'];
        $id = $_POST['id-client'];

        $trueMdp = mdpCorrect($bdd,$id)->fetch();
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

// Affichage du header et du footer
include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue. '.php');
include ('app/vues/admin/footer.php');
