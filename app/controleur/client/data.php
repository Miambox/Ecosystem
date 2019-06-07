<?php

include('app/model/client/requete.data.php');

switch ($action) {

    // Vue permettant d'initialiser les valeurs et de les updater.
    case 'capteur':
      // Si on a bien un id_capteur envoyé
      if(isset($_GET['id_capteur'])) {

        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c')); // Date d'aujourd'hui
        $time = explodeTimeInTimestamp(date('c')); // Temps d'aujourd'hui
        $id_programme = 0;
        
         /**
         * Le second état représente le check entre l'heure/date du programme comparée à celle de maintenant.
         * Lorsque celles-ci correspondent dans la méthode 'updateSecondeEtat' alors on passe l'état second
         * à ON.
         */
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second état à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
       
        // Puis on sélectionne tous les programmes avec un état second à ON.
        $programme = selectProgrammeOn($bdd, $id_capteur);
        if(sizeof($programme) != 0) {

          foreach ($programme as $key => $value) {
            $programme_on = $value['id'];
            $heure_fin = $value['heure_fin'];
            $value_lum = $value['valeur'];
            $etat = $value['etat'];
            $time = explodeTimeInTimestamp(date('c')); // Heure de maintenant

            /**
             * Si l'heure de fin correspond à l'heure de maintenant
             * Si l'état est à off
             * */ 
            if ($time == $heure_fin) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else {

              foreach ($etat_capteur as $key => $value)
              {
                // Si l'état est éteint donc nul en bdd.
                if($value['etat'] == "") {
                  echo initLumValue(); // On met une valeur zéro
                } else {
                  echo updateLumValue($value_lum); // On update la valeur de la lumière 
                }
              }
            }
          }
        } else {
          /**
           * S'il n'y a aucun programme à ON alors on effectue cela.
           */
          $liste_value = selectValueOfCapteur($bdd, $id_capteur);

          foreach ($etat_capteur as $key => $value) {
            // Si l'état est éteint donc nul en bdd.

            if($value['etat'] == "") {
              echo initLumValue(); // On met la valeur à 0
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

    case 'capteurBaton':
    break;

    case 'refreshLight';
      if(isset($_GET['id_capteur'])) {

        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $id_piece = intval(securitePourXSSFail($_GET['id_piece']));
        $etat_capteur = selectEtatOfCapteur($bdd, $id_capteur);
        $date = convertTimeStampInDate(date('c')); // Date d'aujourd'hui
        $time = explodeTimeInTimestamp(date('c')); // Temps d'aujourd'hui
        $id_programme = 0;
        
        /**
         * Le second état représente le check entre l'heure/date du programme comparée à celle de maintenant.
         * Lorsque celles-ci correspondent dans la méthode 'updateSecondeEtat' et 'selectProgrammeNow' alors on passe l'état second
         * à ON.
         */
        $programme_now = selectProgrammeNow($bdd, $id_capteur, $date, $time);
        foreach ($programme_now as $key => $value) {
          // S'il y a un programme on passe son second état à "on".
          $id_programme = $value['id'];
          $active_programme = updateSecondEtat($bdd, $id_programme, "on");
        }
      
        // Puis on sélectionne tous les programmes avec un état second à ON.
        $programme = selectProgrammeOn($bdd, $id_capteur);
        if(sizeof($programme) != 0) {
          foreach ($programme as $key => $value) {
            echo "OK";

            $programme_on = $value['id'];
            $id_objet = $value['id_objet'];
            $heure_fin = $value['heure_fin'];
            $etat = $value['etat'];
            $mode = $value['id_mode'];
            $time = explodeTimeInTimestamp(date('c')); // Heure de maintenant

            /**
             * Si l'heure de fin correspond à l'heure de maintenant
             * Si l'état est à off
             * */ 
            if ($time == $heure_fin) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else if($etat == "" ) {
              $desactive_programme = updateSecondEtat($bdd, $programme_on, "off");
            } else {
              /**
               * Cas où le temps n'est pas fini, l'état n'est pas à off et notre programme doit être activé.
               */
              $updateStateSensor = updateStateSensor($bdd, $id_objet, $mode);
            }
          }
        }
      }

    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "erreur404";
}


?>
