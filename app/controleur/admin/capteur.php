<?php

switch ($action) {

    case 'vuePrincipale':

        $vue = "capteur";
        $title = "Les capteurs";

        break;

    case 'details':
        //Ajouter un nouveau capteur

        $title = "Détails capteur";
        $vue = "detailsCapteur";

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue. '.php');
include ('app/vues/admin/footer.php');
?>
