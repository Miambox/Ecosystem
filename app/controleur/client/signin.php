<?php

switch ($action) {

    case 'information':

        $vue = "signin";
        $title = "Inscription";

        break;

    case 'securite':

        $vue = "password";
        $title = "Inscription";

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
