<?php

include('app/model/client/requete.data.php');


switch ($action) {

    case 'capteur':

      $valeurUtilisee = selectValueOfCapteur($bdd);
      $valeurNonUtilisee = 100 - $valeurUtilisee;
      echo json_encode(
        array(
          "dataPourcent"=>[
            ['Utilisé', 90],
            ['Non-utilisé', 10]
          ],
        )
      );
      break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}
?>
