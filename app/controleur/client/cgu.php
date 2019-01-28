<?php

include('app/model/admin/requete.cgu.php');

switch ($action) {

  case 'cgu':

        $vue = "cgu";
        $title = "CGU";
        $messageCGU = selectionnerCGU($bdd);
        if(isset($_POST['message']))  {
          $cgu = [
            'message'       => htmlspecialchars($_POST['message']),
          ];
         $request = insererMentionsLegales($bdd, $cgu);
         if($request) {
              header('Location: ?Route=admin&Ctrl=cgu&Vue=cgu');
            } else {
              header('Location: ?Route=admin&Ctrl=cgu');
            }
          }
    break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue = "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue.'.php');
include ('app/vues/client/footer.php');
?>