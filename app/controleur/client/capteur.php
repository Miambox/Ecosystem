<?php

switch ($action) {

    case 'vuePrincipale':

        $vue = "capteur";
        $title = "Les capteurs";

        break;

    case 'addCapteur':
        //Ajouter un nouveau capteur

        $title = "Ajouter un capteur";
        $vue = "addCapteur";

        break;

    case 'details':
        //Ajouter un nouveau capteur

        $title = "Détails capteur";
        $vue = "detailsCapteur";

        break;
    case 'data':
      echo json_encode( array( "name"=>"John","time"=>"2pm" ) );
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
