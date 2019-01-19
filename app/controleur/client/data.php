<?php

include('app/model/client/requete.data.php');

switch ($action) {

    // Vue permettant d'initialiser les valeurs et de les updater.
    case 'capteur':
      if(isset($_GET['id_capteur'])) {
        $id_capteur = intval(securitePourXSSFail($_GET['id_capteur']));
        $liste_value = selectValueOfCapteur($bdd, $id_capteur);
        if(sizeof($liste_value) == 0) {
          $request = insererNouvelleValeur($bdd,0,$id_capteur);
          if($request) {
              header('Location: ?Route=client&Ctrl=capteur&Vue=details');
          } else {
            header('Location: ?Route=client&Ctrl=capteur');
          }

        } else {
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
        }
      }
    break;

    // Vue permettant d'augmenter et diminuer la luminosité à l'aide des boutons
    case 'augmenterValeur':
      if(isset($_POST['value']) and isset($_POST['id_capteur'])) {
        $id_capteur = securitePourXSSFail($_POST['id_capteur']);
        $value = securitePourXSSFail($_POST['value']);
        $request = insererNouvelleValeur($bdd,$value, $id_capteur);
      }
      break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


?>
