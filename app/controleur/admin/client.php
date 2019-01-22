<?php

include('app/model/admin/general.php');

switch ($action) {
    // Vue permettant de visualiser les logements du client
    case 'logement':
        $nomClient  = securitePourXSSFail($_POST['nomClient']);
        $id         = securitePourXSSFail($_POST['id']);
        $vue        = "logement";
        $title      = "Détails client";
    break;

    // Vue permettant de visualier les pièces du client
    case 'piece':
        $nomClient        = securitePourXSSFail($_POST['nomClient']);
        $id               = securitePourXSSFail($_POST['id']);
        $idLogement       = securitePourXSSFail($_POST['id_logement']);
        $vue              = "piece";
        $title            = "Logement client";
    break;

    // Vue permettant de visualiser les capteurs
    case 'capteur':
        $nomClient      = securitePourXSSFail($_POST['nomClient']);
        $id             = securitePourXSSFail($_POST['id']);
        $idLogement     = securitePourXSSFail($_POST['id_logement']);
        $idPiece        = securitePourXSSFail($_POST['id_piece']);
        $vue            = "capteur";
        $title          = "Détails client";

        break;

    case 'detailsCapteur':

        $nomClient        = securitePourXSSFail($_POST['nomClient']);
        $id               = securitePourXSSFail($_POST['id']);
        $idLogement       = securitePourXSSFail($_POST['id_logement']);
        $idPiece          = securitePourXSSFail($_POST['id_piece']);
        $idCapteur        = securitePourXSSFail($_POST['id_capteur']);
        $vue              = "detailsCapteur";
        $title            = "Détails client";

        break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title            = "error404";
        $vue              = "erreur404";
}

include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue. '.php');
include ('app/vues/admin/footer.php');
?>
