<?php

switch ($action) {

    case 'vuePrincipale':

        $vue = "profil";
        $title = "Profil";
        // $id = $_SESSION['user']['id']

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue= "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
