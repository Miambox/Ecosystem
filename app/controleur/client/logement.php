<?php

include('app/model/client/requete.logement.php');

switch ($action) {

    case 'vuePrincipale':

        $vue = "logement";
        $title = "Les logements";

        $liste_logement = selectionerLogement($bdd);

        if(isset($_POST['logementId']) and isset($_POST['codePostal'])) {
          $logement = [
            'id' => $_POST['logementId'],
            'codePostal' => $_POST['codePostal'],
          ];

          $request = supprimerLogement($bdd, $logement);
          if($request) {
            alert("Suppresion réussi");
          } else {
            alert("ERREUR, veuillez réessayer !");
          }
        }

        break;

    case 'addLogement':
        /*@Todo: Ajouter les champs pas obligatoire*/
        $title = "Ajouter un logement";
        $vue = "addLogement";

        if( isset($_POST['numero']) and
            isset($_POST['rue']) and
            isset($_POST['ville']) and
            isset($_POST['pays']) and
            isset($_POST['code_postal']) and
            isset($_POST['nbr_habitant']) and
            isset($_POST['surface']) and
            isset($_POST['annee_construction'])) {

          $values = [
            'numero'              => $_POST['numero'],
            'rue'                 => $_POST['rue'],
            'ville'               => $_POST['ville'],
            'pays'                => $_POST['pays'],
            'code_postal'          => $_POST['codePostal'],
            'nbr_habitant'         => $_POST['nbrHabitant'],
            'surface'             => $_POST['surface'],
            'annee_construction'   => $_POST['anneeConstruction'],
          ];
          $request = insererNouveauLogement($bdd, $values);

          if(isset($request)) {
            var_dump("insertion reussi");
          }
        }

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue.'.php');
include ('app/vues/client/footer.php');
?>
