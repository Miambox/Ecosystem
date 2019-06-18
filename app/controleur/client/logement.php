<?php
include('app/model/client/requete.logement.php');

switch ($action) {

    // Vue permettant d'afficher les logements de l'utilisateur
    case 'vuePrincipale':
        $vue = "logement";
        $title = "Les logements";
        if(isset($_SESSION['id'])) {
          $liste_logement = selectionerLogement($bdd);
          // $liste_sensor = selectionnerSensor($bdd);
        } else {
          header('Location: ?Route=client&Ctrl=logement');
        }

        break;

    // Vue permettant d'ajouter un logement
    case 'addLogement':
        $title = "Ajouter un logement";
        $vue = "addLogement";

        if( isset($_POST['numero']) and
            isset($_POST['rue']) and
            isset($_POST['ville']) and
            isset($_POST['code_postal']) and
            isset($_POST['nbr_habitant']) and
            isset($_POST['surface'])) {

            $values = [
              'numero'              => securitePourXSSFail($_POST['numero']),
              'rue'                 => securitePourXSSFail($_POST['rue']),
              'ville'               => securitePourXSSFail($_POST['ville']),
              'code_postal'          => securitePourXSSFail($_POST['code_postal']),
              'nbr_habitant'         => securitePourXSSFail($_POST['nbr_habitant']),
              'surface'             => securitePourXSSFail($_POST['surface']),
              'annee_construction'   => securitePourXSSFail($_POST['annee_construction']),
            ];
            $request = insererNouveauLogement($bdd, $values);

            if(isset($request)) {
              header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
            } else {
              header('Location: ?Route=client&Ctrl=logement');
            }
        }
        break;

    // Vue permettant de supprimer un logement
    case "supprimerLogement":
      $vue = "logement";
      $title = "Les logements";

      if(isset($_POST['logement_id']) and isset($_POST['code_postal'])) {
        $logement = [
          'id'              => securitePourXSSFail($_POST['logement_id']),
          'code_postal'     => securitePourXSSFail($_POST['code_postal']),
        ];

        $request = supprimerLogement($bdd, $logement);

        if($request) {
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
        } else {
        }
      } else {
          header('Location: ?Route=client&Ctrl=logement');
      }
    break;

    // Vue permettant de partager un logement
    case "partageLogement":
      $vue="logement";
      $title="Les logements";

      if( isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail'])) {

        $user_partage = [
          'id_logement'   => securitePourXSSFail($_POST['id_logement']),
          'nom'           => securitePourXSSFail($_POST['nom']),
          'prenom'        => securitePourXSSFail($_POST['prenom']),
          'mail'          => securitePourXSSFail($_POST['mail']),
        ];

        $request = insererNouveauPartageLogement($bdd, $user_partage);

        if(!$request) {
          header('Location: ?Route=client&Ctrl=logement');
        } else {
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
        }
      } else {
        header('Location: ?Route=client&Ctrl=logement');
      }
    break;

    case 'editerLogement':
      $title = "Editer un logement";
      $vue = "addLogement";
      if(isset($_POST['id_logement'])) {
        $id_logement = securitePourXSSFail($_POST['id_logement']);
        $information_logement = selectionnerLogementById($bdd, intval($id_logement));
      }
    break;

    case 'updaterLogement':
      $title = "Editer un logement";
      $vue="addLogement";
      if( isset($_POST['numero']) and
          isset($_POST['rue']) and
          isset($_POST['ville']) and
          isset($_POST['code_postal']) and
          isset($_POST['nbr_habitant']) and
          isset($_POST['surface'])) {

          $values = [
            'numero'              => securitePourXSSFail($_POST['numero']),
            'rue'                 => securitePourXSSFail($_POST['rue']),
            'ville'               => securitePourXSSFail($_POST['ville']),
            'code_postal'          => securitePourXSSFail($_POST['code_postal']),
            'nbr_habitant'         => securitePourXSSFail($_POST['nbr_habitant']),
            'surface'             => securitePourXSSFail($_POST['surface']),
            'annee_construction'   => securitePourXSSFail($_POST['annee_construction']),
          ];

          $id_logement = securitePourXSSFail($_POST['id_logement']);
          $request = updaterLogement($bdd, $values, intval($id_logement));
          if(isset($request)) {
            header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
          } else {
            header('Location: ?Route=client&Ctrl=logement');
          }
      }


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue="erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue.'.php');
include ('app/vues/client/footer.php');
?>
