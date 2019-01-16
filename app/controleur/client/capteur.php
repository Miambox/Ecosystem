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

    // Vue permettant de voir les détails du capteur
    case 'details':
        $title = "Détails capteur";
        $vue = "detailsCapteur";

        if(isset($_POST['id_capteur'])) {
          $idCapteur = securitePourXSSFail($_POST['id_capteur']);
          $donneesCapteur =  infoCapteur($bdd, $idCapteur);

          // Liste permettant de sélectionner les ambiances d'un capteur
          $liste_ambiance = selectionnerAmbiance($bdd);
          // liste permettant de sélectionner les programmes d'un capteur
          $liste_programme = selectionnerProgramme($bdd, $idCapteur);

          foreach ($liste_programme as $key => $value) {
            $response = selectionnerAmbianceParId($bdd,$value['id_mode']);
            foreach ($response as $key => $value) {
              $ambiance = $value['nom'];
            }
          }
        } else if(isset($_GET['id_capteur'])) {
          $idCapteur = securitePourXSSFail($_GET['id_capteur']);
          $donneesCapteur =  infoCapteur($bdd, $idCapteur);

          // Liste permettant de sélectionner les ambiances d'un capteur
          $liste_ambiance = selectionnerAmbiance($bdd);
          // liste permettant de sélectionner les programmes d'un capteur
          $liste_programme = selectionnerProgramme($bdd, $idCapteur);

          foreach ($liste_programme as $key => $value) {
            $response = selectionnerAmbianceParId($bdd,$value['id_mode']);
            foreach ($response as $key => $value) {
              $ambiance = $value['nom'];
            }
          }
        } else {
          header('Location: ?Route=client&Ctrl=capteur');
        }

        break;

    // LES PROGRAMMES
    case 'addProgramme':

      if( isset($_POST['heure_debut']) and
          isset($_POST['heure_fin']) and
          isset($_POST['date']) and
          isset($_POST['ambiance'])) {
            $values = [
              'heure_debut'       => securitePourXSSFail($_POST['heure_debut']),
              'heure_fin'         => securitePourXSSFail($_POST['heure_fin']),
              'date'              => securitePourXSSFail($_POST['date']),
              'ambiance'          => securitePourXSSFail($_POST['ambiance']),
            ];
            $request = insererNouveauProgramme($bdd, $values);

            if($request) {
            } else {
              $alerte = "Erreur de base de donnée, veuillez réessayer";
            }
          }
    break;

    case 'supprimerProgramme':
        $title = "Détails capteur";

        if(isset($_POST['id_programme'])) {
              $values = [
                'id_programme'          => securitePourXSSFail($_POST['id_programme']),
              ];
              $request = supprimerProgramme($bdd, $values);

              if($request) {
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details');
              } else {
                $alerte = "Erreyr de base de donnée veuillez réessayer";
              }
            }
    break;

    case 'activeProgramme':
        $title = "Détails capteur";
        $vue = "detailsCapteur";

        if(isset($_POST['id_programme'])) {
              if(isset($_POST['on_programme'])) {
                $values = [
                  'id_programme'          => securitePourXSSFail($_POST['id_programme']),
                  'on_programme'       => securitePourXSSFail($_POST['on_programme']),
                ];
                $request = activeProgramme($bdd, $values);
              } else {
                $values = [
                  'id_programme'        => securitePourXSSFail($_POST['id_programme']),
                  'off_programme'       => securitePourXSSFail($_POST['off_programme']),
                ];
                $request = desactiveProgramme($bdd, $values);
              }
        }
    break;

    // LES AMBIANCES
    // Vue permettant d'ajouter une ambiance
    case 'addAmbiance':
      if( isset($_POST['nom']) and isset($_POST['valeur'])) {
            $id_capteur = securitePourXSSFail($_POST['id_capteur']);
            $values = [
              'nom'       => securitePourXSSFail($_POST['nom']),
              'valeur'    => securitePourXSSFail($_POST['valeur']),
            ];
            $request = insererNouvelleAmbiance($bdd, $values);

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur));
            } else {
              header('Location: ?Route=client&Ctrl=capteur');
            }
      } else {
        header('Location: ?Route=client&Ctrl=capteur');
      }
    break;

    // Vue permettant de supprimer une ambiance
    case 'supprimerAmbiance':
      if(isset($_POST['id_ambiance'])) {
        $id_capteur = $_POST['id_capteur'];
        $id_ambiance = securitePourXSSFail($_POST['id_ambiance']);
        $request = supprimerAmbiance($bdd, $id_ambiance);

        if($request) {
          header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='.intval($id_capteur));
        } else {
          header('Location: ?Route=client&Ctrl=capteur');
        }
      } else {
        header('Location: ?Route=client&Ctrl=capteur');
      }

    break;

    default:
        $title = "error404";
        $vue="erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
