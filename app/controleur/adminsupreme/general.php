<?php

switch ($action) {

    case 'home':

        $vue = "home";
        $title = "Administration";

        break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/adminsupreme/'.$vue. '.php');
?>
