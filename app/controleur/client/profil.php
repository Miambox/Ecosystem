<?php

include('app/model/client/requete.profil.php');


switch ($action) {

    case 'vuePrincipale':

        $vue = "profil";
        $title = "Profil";
        $liste_user_share_logement = selectionnerLogementWhichShare($bdd);

    break;

    case 'supprimerPartage':
      $vue = "profil";
      $title = "Profil";
      if(isset($_POST['id_user'])) {
        $id_user = securitePourXSSFail($_POST['id_user']);
        $request = supprimerPartage($bdd, $id_user);
        if($request) {
          header('Location: ?Route=client&Ctrl=profil&Vue=vuePrincipale');
        } else {
          header('Location: ?Route=client&Ctrl=profil');
        }
      } else {
        header('Location: ?Route=client&Ctrl=profil');
      }
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue= "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
