<?php

include('app/model/client/requete.logement.php');

switch ($action) {

    case 'vuePrincipale':

        $vue = "logement";
        $title = "Les logements";

        $liste_logement = selectionerLogement($bdd);

        break;

    case 'addLogement':
        /*@Todo: Ajouter les champs pas obligatoire*/
        $title = "Ajouter un logement";
        $vue = "addLogement";

        if( isset($_POST['numero']) and
            isset($_POST['rue']) and
            isset($_POST['ville']) and
            isset($_POST['code_postal']) and
            isset($_POST['nbr_habitant']) and
            isset($_POST['surface']) and
            isset($_POST['annee_construction'])) {

          $values = [
            'numero'              => $_POST['numero'],
            'rue'                 => $_POST['rue'],
            'ville'               => $_POST['ville'],
            'code_postal'          => $_POST['code_postal'],
            'nbr_habitant'         => $_POST['nbr_habitant'],
            'surface'             => $_POST['surface'],
            'annee_construction'   => $_POST['annee_construction'],
          ];
          $request = insererNouveauLogement($bdd, $values);

          if(isset($request)) {
            header('Location: ?Route=client&Ctrl=piece&Vue=addPiece');
          }
        } else {
          $alerte = 1;
          $alerte_explication= 'Vous avez oublié un champs obligatoire, merci de recommencer.';
        }
        break;

    case "supprimerLogement":
      $vue = "logement";
      $title = "Les logements";

      if(isset($_POST['logement_id']) and isset($_POST['code_postal'])) {
        $logement = [
          'id' => $_POST['logement_id'],
          'code_postal' => $_POST['code_postal'],
        ];

        $request = supprimerLogement($bdd, $logement);

        if($request) {
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
        } else {
          $alerte = "Le code postal ne correspond pas";
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
        }
      } else {
          $alerte = "Le code postal ne correspond pas";
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
      }



    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue.'.php');
include ('app/vues/client/footer.php');
?>
