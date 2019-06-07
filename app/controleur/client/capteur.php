<?php
include('app/model/client/requete.capteur.php');
include('app/model/client/requete.throwDataSensor.php');

switch ($action) {

    case 'vuePrincipale':
        $vue = "capteur";
        $title = "Les capteurs";
        if(isset ($_POST["id_piece"])) {
          if(isset($_POST["id_logement"])) {
            $IDLOGEMENT = $_POST["id_logement"];
          }
          $IDPIECE = $_POST["id_piece"];
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
        $sensor_type = getSensorType($bdd);
        if( isset($_POST['ref']) and
            isset($_POST['nom']) and
            isset($_POST['id_piece'])) {

          $values = [
            'numero_ref'              => $_POST['ref'],
            'nom'                 => $_POST['nom'],
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

          $id_piece = securitePourXSSFail($_POST['id_piece']);
          $idCapteur = securitePourXSSFail($_POST['id_capteur']);
          $donneesCapteur =  infoCapteur($bdd, $idCapteur);
          $sensor_type = getSensorTypeById($bdd, $idCapteur);
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
          $id_piece = $_GET['id_piece'];
          $idCapteur = securitePourXSSFail($_GET['id_capteur']);
          $sensor_type = getSensorTypeById($bdd, $idCapteur);
          $donneesCapteur =  infoCapteur($bdd, $idCapteur);
          
          // Etat du capteur
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

    case 'updateStateSensor':
      if(isset($_POST['id_capteur'])) {
          $id_capteur = securitePourXSSFail($_POST['id_capteur']);
          $id_piece = $_POST['id_piece'];
          if(isset($_POST['state'])) {
            $values = [
            'id_capteur'          => securitePourXSSFail($_POST['id_capteur']),
            'state'       => securitePourXSSFail($_POST['state']),
            ];
            var_dump($values);
            $request = updateStateSensor($bdd, $values);

            $sensor = selectionnerCapteurById($bdd, $id_capteur);

            foreach($sensor as $key => $value) {

              if ($value['nom'] == 'ecotemperature') {
                $type = '3';
              } else if ($value['nom'] == 'ecolight') {
                $type = '5';
              }

              if ($value['etat'] == 'auto') {
                $sensor_value_binary = '0002';
              } else if ($value['etat'] == 'on') {
                $sensor_value_binary = '0001';
              } else if ($value['etat'] == 'off') {
                $sensor_value_binary = '0000';
              } else {
                $sensor_value_binary = $value['etat'];
              }

              $response = sendDataToPasserelle(
                '001D',
                $type,
                '01',
                $sensor_value_binary,
                date('Y'),
                date('m'),
                date('d'),
                date('H'),
                date('i'),
                date('s')
              );
            }

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur . "&id_piece=". $id_piece);
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
          isset($_POST['date'])) {
            $id_capteur = securitePourXSSFail($_POST['id_capteur']);
            $id_piece = securitePourXSSFail($_POST['id_piece']);

            // SI on stocke un programme de type temperature alors la variable 'ambiance' est pleine
            if(isset($_POST['ambiance'])) {
              $values = [
                'heure_debut'       => securitePourXSSFail($_POST['heure_debut']),
                'heure_fin'         => securitePourXSSFail($_POST['heure_fin']),
                'date'              => securitePourXSSFail($_POST['date']),
                'ambiance'          => securitePourXSSFail($_POST['ambiance']),
              ];
              $request = insererNouveauProgramme($bdd, $values, $id_capteur);  
            }

            // SI on stocke un programme de type light alors :
            if (isset($_POST['mode'])) {
              $values = [
                'heure_debut'       => securitePourXSSFail($_POST['heure_debut']),
                'heure_fin'         => securitePourXSSFail($_POST['heure_fin']),
                'date'              => securitePourXSSFail($_POST['date']),
                'ambiance'          => securitePourXSSFail($_POST['mode']),
              ];
              $request = insererNouveauProgramme($bdd, $values, $id_capteur);
            }
            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur) . "&id_piece=" . intval($id_piece));
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
          $id_piece = securitePourXSSFail($_POST['id_piece']);
          $values = [
            'id_programme'          => securitePourXSSFail($_POST['id_programme']),
          ];
          $request = supprimerProgramme($bdd, $values);

          if($request) {
            header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. $id_capteur .'&id_piece='. $id_piece);
          } else {
            header('Location: ?Route=Client&Ctrl=capteur');
          }
        } else {
          header('Location: ?Route=Client&Ctrl=capteur');
        }
    break;

    // Vue permettant d'activer et desactiver le programme
    case 'activeProgramme':
        $id_capteur = securitePourXSSFail($_POST['id_capteur']);
        $id_piece = securitePourXSSFail($_POST['id_piece']);
        if(isset($_POST['id_programme'])) {
            if(isset($_POST['on_programme'])) {
              $values = [
              'id_programme'          => securitePourXSSFail($_POST['id_programme']),
              'on_programme'       => securitePourXSSFail($_POST['on_programme']),
              ];
              $request = activeProgramme($bdd, $values);

              if($request) {
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur). "&id_piece=" . intval($id_piece));
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
                header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur). "&id_piece=" . intval($id_piece));
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
            $id_piece = securitePourXSSFail($_POST['id_piece']);
            $values = [
              'nom'       => securitePourXSSFail($_POST['nom']),
              'valeur'    => securitePourXSSFail($_POST['valeur']),
            ];
            $request = insererNouvelleAmbiance($bdd, $values);

            if($request) {
              header('Location: ?Route=Client&Ctrl=capteur&Vue=details&id_capteur='. intval($id_capteur) . "&id_piece=" . intval($id_piece));
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

    case 'editerCapteur':
      $vue="addCapteur";
      $title="Editer un capteur";
      $id_capteur = securitePourXSSFail($_POST['id_capteur']);
      $id_piece = $_POST['id_piece'];
      $id_logement = $_POST['id_logement'];
      $information_capteur = selectionnerCapteurById($bdd, intval($id_capteur));
    break;

    case 'updaterCapteur':
      $vue="addCapteur";
      $title="Editer un capteur";
      $id_piece = $_POST['id_piece'];
      $id_logement = $_POST['id_logement'];
      $id_capteur = securitePourXSSFail($_POST['id_capteur']);
      if( isset($_POST['ref']) and
          isset($_POST['nom']) and
          isset($_POST['id_piece']))
          {
          $values = [
            'numero_ref'              => $_POST['ref'],
            'nom'                 => $_POST['nom'],
            'id_piece'      => $_POST['id_piece']
          ];
          $request = updaterCapteur($bdd, $id_capteur, $values);
          if(isset($request)) {
            header('Location: ?Route=client&Ctrl=capteur&Vue=vuePrincipale&id_piece='. intval($id_piece) . '&id_logement='. intval($id_logement));
          }
      } else {
        $alerte = 1;
        $alerte_explication= 'Vous avez oublié un champs obligatoire, merci de recommencer.';
      }
    break;

    default:
        $title = "error404";
        $vue = "erreur404";
}

if($_SESSION['type']=="utilisateur"){
  include ('app/vues/client/header.php');
  include ('app/vues/client/'.$vue. '.php');
  include ('app/vues/client/footer.php');
} else {
  include ('app/vues/admin/header.php');
  include ('app/vues/client/'.$vue. '.php');
  include ('app/vues/admin/footer.php');
}

?>
