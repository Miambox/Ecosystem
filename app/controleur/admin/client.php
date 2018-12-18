<?php

switch ($action) {

    case 'logement':

        $vue = "logement";
        $title = "Détails client";

        break;

    case 'piece':

        $vue = "piece";
        $title = "Logement client";

        break;

    case 'chat':

        $vue = "chat";
        $title = "Chat";

        break;

    case 'capteur':

        $vue = "capteur";
        $title = "Détails client";

        break;

    case 'detailsCapteur':

        $vue = "detailsCapteur";
        $title = "Détails client";

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
