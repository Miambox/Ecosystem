<?php

include('app/model/client/requete.data.php');

switch ($action) {

    // Vue permettant d'initialiser les valeurs et de les updater.
    case 'capteur':
      // Si on a bien un id_capteur envoyé
      if(isset($_GET['id_capteur'])) {

        // Initialisation des variables
        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c'));
        $time = explodeTimeInTimestamp(date('c'));
        $id_programme = 0;
        // On regarde s'il y a un programme existant en BDD
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second étât à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
        $programme = selectProgrammeOn($bdd, $id_capteur);

        // S'il y a un programme à ON.
        if(sizeof($programme) != 0) {

          foreach ($programme as $key => $value) {
            $programme_on = $value['id'];
            $heure_fin = $value['heure_fin'];
            $value_lum = $value['valeur'];
            $etat = $value['etat'];

            $time = explodeTimeInTimestamp(date('c'));

            // Si l'heure de fin correspond à l'heure de maintenant
            if($time == $heure_fin) {
              // On passe l'état second à off
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else {

              // On regarde l'état du capteur
              foreach ($etat_capteur as $key => $value)
              {
                // Si l'état est éteint donc nul en bdd.
                if($value['etat'] == "") {
                  // On met la valeur à 0
                  echo initLumValue();
                } else {
                  echo updateLumValue($value_lum);
                }
              }// Si l'état est à 0
            }
          }
        } else {

          foreach ($etat_capteur as $key => $value) {
            // Si l'état est éteint donc nul en bdd.
            if($value['etat'] == "") {
              // On met la valeur à 0
              echo initLumValue();

            } else if($value['etat'] == "on") {
              // Sinon on selectionne la valeur en bdd du capteur
              $liste_value = selectValueOfCapteur($bdd, $id_capteur);
              // Si la taille de la liste vaut 0, cela signifie que c'est un nouveau capteur
              if(sizeof($liste_value) == 0) {
                // Alors on en créé un, initialiser avec la valeur 0
                $request = insererNouvelleValeur($bdd,0,$id_capteur);
                if($request) {
                    header('Location: ?Route=client&Ctrl=capteur&Vue=details');
                } else {
                  header('Location: ?Route=client&Ctrl=capteur');
                }
              } else {
                // Sinon on regarde ses valeurs
                foreach ($liste_value as $key => $value) {
                  echo updateLumValue($value['valeur']);
                }
              }
            }
          }
        }

      }
    break;

    // Vue permettant d'augmenter et diminuer la luminosité à l'aide des boutons
    case 'augmenterValeur':
      if(isset($_POST['value']) and isset($_POST['id_capteur'])) {
        $id_capteur = securitePourXSSFail($_POST['id_capteur']);
        $value = securitePourXSSFail($_POST['value']);
        $request = updateValeur($bdd, $value, $id_capteur);
      }
      break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


?>
