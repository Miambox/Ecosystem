<?php

include('app/model/requete.mentionsLegales.php');

switch ($action) {

  case 'mentionsLegales':

        $vue = "mentionsLegales";
        $title = "MentionsLegales";
        $messageMentionsLegales = selectionnerMentionsLegales($bdd);
        if(isset($_POST['message']))  {
          $mentionsLegales = [
            'message'       => htmlspecialchars($_POST['message']),
          ];
         $request = insererMentionsLegales($bdd, $mentionsLegales);
         if($request) {
              header('Location: ?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales');
            } else {
              header('Location: ?Route=admin&Ctrl=mentionsLegales');
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
