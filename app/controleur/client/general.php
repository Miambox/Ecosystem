<?php

switch ($action) {

    case 'home':
        $vue = "home";
        $title = "Accueil";

        break;

    case 'mentionLegale':
        //Ajouter un nouveau capteur
        $title = "mentionLegale";
        $vue = "mentionLegale";

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue = "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
