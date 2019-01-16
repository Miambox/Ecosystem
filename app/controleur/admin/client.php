<?php

// Connexion a la base de donnees
include('app/model/admin/general.php');

switch ($action) {

    case 'logement':

        $nomClient = $_POST['nomClient'];
        $id = $_POST['id'];
        $vue = "logement";
        $title = "Détails client";

        break;

    case 'piece':

        $nomClient = $_POST['nomClient'];
        $id = $_POST['id'];
        $idLogement = $_POST['id_logement'];
        $vue = "piece";
        $title = "Logement client";

        break;

    case 'capteur':

        $nomClient = $_POST['nomClient'];
        $id = $_POST['id'];
        $idLogement = $_POST['id_logement'];
        $idPiece = $_POST['id_piece'];
        $vue = "capteur";
        $title = "Détails client";

        break;

    case 'detailsCapteur':

        $nomClient = $_POST['nomClient'];
        $id = $_POST['id'];
        $idLogement = $_POST['id_logement'];
        $idPiece = $_POST['id_piece'];
        $idCapteur = $_POST['id_capteur'];
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
