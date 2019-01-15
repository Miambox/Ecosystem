<?php

include('app/model/client/requete.piece.php');

switch ($action) {

    case 'vuePrincipale':

        $vue = "piece";
        $title = "Les pieces";

        if(isset($_POST['id_logement'])) {
          $id_logement = securitePourXSSFail($_POST['id_logement']);
          $liste_piece = selectionnerPiece($bdd, $id_logement);
        }

        break;

    case 'addPiece':
        //Ajouter un nouveau capteur

        $title = "Ajouter une piece";
        $vue = "addPiece";
        $id_logement = $_POST['id_logement'];
        if( isset($_POST['nom']) and
            isset($_POST['type']) and
            isset($_POST['etage']) and
            isset($_POST['surface']))
            {
            $values = [
              'nom'              => securitePourXSSFail($_POST['nom']),
              'type'             => securitePourXSSFail($_POST['type']),
              'etage'            => securitePourXSSFail($_POST['etage']),
              'surface'          => securitePourXSSFail($_POST['surface'])
            ];
            $request = insererNouvellePiece($bdd, $values, $id_logement);

            if(isset($request)) {
              header('Location: ?Route=client&Ctrl=capteur&Vue=addCapteur');
            } else {
              $alerte = "Erreur de base de donnée, veuillez réessayer";
            }
        } else {
          $alerte_explication= 'Vous avez oublié un champs obligatoire, merci de recommencer.';
        }

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
