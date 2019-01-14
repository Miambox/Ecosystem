<?php
include('app/model/client/requete.capteur.php');

switch ($action) {

    case 'vuePrincipale':

        $vue = "capteur";
        $title = "Les capteurs";




        $donneesCapteur = selectionerCapteur($bdd, 1);
        $donneespiece = infoPiece($bdd, 1);

        break;

    case 'addCapteur':
        /*@Todo: Ajouter les champs pas obligatoire*/
        $title = "Ajouter un capteur";
        $vue = "addCapteur";
        $id_piece = $_POST['id_piece'];

        if( isset($_POST['ref']) and
            isset($_POST['nom']) and
            isset($_POST['unit']) and
            isset($_POST['type']) and
            isset($_POST['id_piece'])) {

          $values = [
            'numero_ref'              => $_POST['ref'],
            'nom'                 => $_POST['nom'],
            'unit'               => $_POST['unit'],
            'type'          => $_POST['type'],
            'id_piece'      => $_POST['id_piece']

          ];
          $request = insererNouveauCapteur($bdd, $values);

          if(isset($request)) {
            header('Location: ?Route=client&Ctrl=capteur&Vue=vuePrincipale');
          }
        } else {
          $alerte = 1;
          $alerte_explication= 'Vous avez oublié un champs obligatoire, merci de recommencer.';
        }

        break;

    case 'details':
        //Ajouter un nouveau capteur


        $title = "Détails capteur";
        $vue = "detailsCapteur";

        $idCapteur = $_POST['id_capteur'];
        //if( isset($_POST['id_capteur'])) {
        $donneesCapteur =  infoCapteur($bdd, idCapteur);
        //}

        $liste_ambiance = selectionnerAmbiance($bdd);

        $liste_programme = selectionnerProgramme($bdd);

        foreach ($liste_programme as $key => $value) {
          $response = selectionnerAmbianceParId($bdd,$value['id_mode']);
          foreach ($response as $key => $value) {
            $ambiance = $value['nom'];
          }
        }

        break;

    case 'data':
      echo json_encode( array( "name"=>"John","time"=>"2pm" ) );
      break;

    case 'addProgramme':


      if( isset($_POST['heure_debut']) and
          isset($_POST['heure_fin']) and
          isset($_POST['date']) and
          isset($_POST['ambiance'])) {
            $values = [
              'heure_debut'              => $_POST['heure_debut'],
              'heure_fin'                 => $_POST['heure_fin'],
              'date'               => $_POST['date'],
              'ambiance'          => $_POST['ambiance'],
            ];
            $request = insererNouveauProgramme($bdd, $values);

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details');
            } else {
              var_dump("impossible d'ajouter le programme");
            }
          }

      break;

      case 'supprimerProgramme':
        $title = "Détails capteur";

        if(isset($_POST['id_programme'])) {
              $values = [
                'id_programme'          => $_POST['id_programme'],
              ];
              var_dump($values);
              $request = supprimerProgramme($bdd, $values);

              if($request) {
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details');
              } else {
                var_dump("impossible d'ajouter le programme");
              }
            }
      break;

      case 'activeProgramme':
        $title = "Détails capteur";
        $vue = "detailsCapteur";


      if(isset($_POST['id_programme'])) {
            if(isset($_POST['on_programme'])) {
              $values = [
                'id_programme'          => $_POST['id_programme'],
                'on_programme'       => $_POST['on_programme'],
              ];
              var_dump($values);
              $request = activeProgramme($bdd, $values);
            } else {
              $values = [
                'id_programme'          => $_POST['id_programme'],
                'off_programme'       => $_POST['off_programme'],
              ];
              var_dump($values);
              $request = desactiveProgramme($bdd, $values);
            }

            // if($request) {
            //   header('Location: ?Route=Client&Ctrl=capteur&Vue=addProgramme');
            // } else {
            //   var_dump("impossible d'ajouter le programme");
            // }
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
