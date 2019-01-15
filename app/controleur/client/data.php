<?php

include('app/model/client/requete.data.php');

switch ($action) {

    case 'capteur':
        $liste_value = selectValueOfCapteur($bdd);

        foreach ($liste_value as $key => $value) {
          echo json_encode(
            array(
              "dataPourcent"=> [
                ["Utilise", intval($value['valeur'])],
                ["Non-utilise", 100-$value['valeur']]
              ],
            )
          );
        }
      break;

    case 'augmenterValeur':
      if(isset($_POST['value'])) {
        $value = securitePourXSSFail($_POST['value']);
        $request = insererNouvelleValeur($bdd,$value);
      }
      break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


?>
