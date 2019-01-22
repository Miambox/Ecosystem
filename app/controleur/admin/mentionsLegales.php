<?php

include('app/model/admin/requete.mentionsLegales.php');

switch ($action) {

  // Vue des mentions légales
  case 'mentionsLegales':
        $vue                      = "mentionsLegales";
        $title                    = "MentionsLegales";
        $messageMentionsLegales   = selectionnerMentionsLegales($bdd);

        if(isset($_POST['message']))  {
          $mentionsLegales = [
            'message'       => $_POST['message'],
          ];
         $request = insererMentionsLegales($bdd, $mentionsLegales);
         if($request) {
              header('Location: ?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales');
            } else {
              header('Location: ?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales');
            }
          }
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue = "erreur404";
}
include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue.'.php');
include ('app/vues/admin/footer.php');
?>
