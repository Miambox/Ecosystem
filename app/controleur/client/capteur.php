<?php
include('app/model/client/requete.capteur.php');

switch ($action) {

    case 'vuePrincipale':

        $vue = "capteur";
        $title = "Les capteurs";
        if(isset ($_POST["id_piece"]) and isset ($_POST["id_logement"]) ){
          $IDPIECE = $_POST["id_piece"];
          $IDLOGEMENT = $_POST["id_logement"];
        } else if(isset($_GET['id_piece']) and isset ($_GET["id_logement"]) ){
          $IDPIECE = $_GET["id_piece"];
          $IDLOGEMENT = $_GET["id_logement"];
        } else {
          header('Location: ?Route=client&Ctrl=capteur');
        }

        $donneesCapteur = selectionerCapteur($bdd, $IDPIECE);
        $donneespiece = infoPiece($bdd, $IDPIECE);
        break;

    case 'addCapteur':
        /*@Todo: Ajouter les champs pas obligatoire*/
        $title = "Ajouter un capteur";
        $vue = "addCapteur";
        $id_piece = $_POST['id_piece'];
        $id_logement = $_POST['id_logement'];
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
            header('Location: ?Route=client&Ctrl=capteur&Vue=vuePrincipale&id_piece='. $id_piece . '&id_logement='. $id_logement);
          }
        } else {
          $alerte = 1;
          $alerte_explication= 'Vous avez oublié un champs obligatoire, merci de recommencer.';
        }
    break;

    case 'supprimerCapteur':

      if(isset($_POST['id_capteur']) and isset($_POST['nom'])) {
        $id_logement = $_POST['id_logement'];
        $id_piece = $_POST['id_piece'];
        $capteur = [
          'id'      => securitePourXSSFail($_POST['id_capteur']),
          'nom'    => securitePourXSSFail($_POST['nom']),
        ];

        $request = supprimerCapteur($bdd, $capteur);

        if($request) {
          header('Location: ?Route=client&Ctrl=capteur&Vue=vuePrincipale&id_piece='. $id_piece . '&id_logement='. $id_logement);
        } else {
          header('Location: ?Route=client&Ctrl=capteur');
        }
      } else {
        header('Location: ?Route=client&Ctrl=capteur');
      }
    break;

    case 'details':
        $title = "Détails capteur";
        $vue = "detailsCapteur";

        if(isset($_POST['id_capteur'])) {
          $idCapteur = securitePourXSSFail($_POST['id_capteur']);
          $donneesCapteur =  infoCapteur($bdd, $idCapteur);

          $etatCapteur = etatCapteur($bdd, $idCapteur);

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
          $etatCapteur = etatCapteur($bdd, $idCapteur);

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

    case 'activeCapteur':
      if(isset($_POST['id_capteur'])) {
          $id_capteur = securitePourXSSFail($_POST['id_capteur']);
          if(isset($_POST['on_capteur'])) {
            $values = [
            'id_capteur'          => securitePourXSSFail($_POST['id_capteur']),
            'on_capteur'       => securitePourXSSFail($_POST['on_capteur']),
            ];
            $request = activeCapteur($bdd, $values);

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur);
            } else {
              header('Location: ?Route=Client&Ctrl=capteur');
            }
          } else {
          $values = [
          'id_capteur'        => securitePourXSSFail($_POST['id_capteur']),
          'off_capteur'       => securitePourXSSFail($_POST['off_capteur']),
          ];
          $request = desactiveCapteur($bdd, $values);
            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur);
            } else {
            header('Location: ?Route=Client&Ctrl=capteur');
            }
          }
      } else {
        header('Location: ?Route=Client&Ctrl=capteur');
      }
    break;
    // LES PROGRAMMES
    // Vue permettant d'ajouter un programme
    case 'addProgramme':
      if( isset($_POST['heure_debut']) and
          isset($_POST['heure_fin']) and
          isset($_POST['date']) and
          isset($_POST['ambiance'])) {
            $id_capteur = securitePourXSSFail($_POST['id_capteur']);
            $values = [
              'heure_debut'       => securitePourXSSFail($_POST['heure_debut']),
              'heure_fin'         => securitePourXSSFail($_POST['heure_fin']),
              'date'              => securitePourXSSFail($_POST['date']),
              'ambiance'          => securitePourXSSFail($_POST['ambiance']),
            ];
            $request = insererNouveauProgramme($bdd, $values, $id_capteur);

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur));
            } else {
              header('Location: ?Route=client&Ctrl=cpateurs');
            }
      } else {
        header('Location: ?Route=client&Ctrl=capteur');
      }
    break;

    // Vue permettant de supprimer un programme
    case 'supprimerProgramme':
        if(isset($_POST['id_programme'])) {
          $id_capteur = securitePourXSSFail($_POST['id_capteur']);
          $values = [
            'id_programme'          => securitePourXSSFail($_POST['id_programme']),
          ];
          $request = supprimerProgramme($bdd, $values);

          if($request) {
            header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur);
          } else {
            header('Location: ?Route=Client&Ctrl=capteur');
          }
        } else {
          header('Location: ?Route=Client&Ctrl=capteur');
        }
    break;

    // Vue permettant d'activer et desactiver le programme
    case 'activeProgramme':
        $id_capteur = $_POST['id_capteur'];
        if(isset($_POST['id_programme'])) {
            if(isset($_POST['on_programme'])) {
              $values = [
              'id_programme'          => securitePourXSSFail($_POST['id_programme']),
              'on_programme'       => securitePourXSSFail($_POST['on_programme']),
              ];
              $request = activeProgramme($bdd, $values);

              if($request) {
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur);
              } else {
                header('Location: ?Route=Client&Ctrl=capteur');
              }
            } else {
            $values = [
            'id_programme'        => securitePourXSSFail($_POST['id_programme']),
            'off_programme'       => securitePourXSSFail($_POST['off_programme']),
            ];
            $request = desactiveProgramme($bdd, $values);
              if($request) {
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur);
              } else {
              header('Location: ?Route=Client&Ctrl=capteur');
              }
            }
        } else {
          header('Location: ?Route=Client&Ctrl=capteur');
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
        $vue = "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
