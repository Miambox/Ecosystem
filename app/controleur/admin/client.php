<?php



// Connexion a la base de donnees
include('app/model/admin/general.php');

switch ($action) {

    case 'logement':

        $id = $_POST['id'];
        $vue = "logement";
        $title = "Détails client";

        break;

    case 'piece':

        $idLogement = $_POST['id'];
        $vue = "piece";
        $title = "Logement client";

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
