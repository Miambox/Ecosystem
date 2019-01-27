<?php

include('app/model/admin/requete.faq.php');

switch ($action) {

  case 'faq':
      $vue = "faq";
      $title = "FAQ";
      $listeFAQ = selectionnerFAQ($bdd);

      if(isset($_POST['type']) and isset($_POST['question']) and isset($_POST['reponse']) and (($_POST['id_utilisateur']) ==3))  {
        $faq = [
          'type'       => htmlspecialchars($_POST['type']),
          'question'   => htmlspecialchars($_POST['question']),
          'reponse'    => htmlspecialchars($_POST['reponse']),
          'id_utilisateur'  => htmlspecialchars($_POST['id_utilisateur']),
        ];
       $request = insererFAQ($bdd, $faq);
       if($request) {
            header('Location: ?Route=client&Ctrl=faq&Vue=faq');
          } else {
            header('Location: ?Route=client&Ctrl=faq');
          }
        }
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title  = "error404";
        $vue    = "erreur404";
}


include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue.'.php');
include ('app/vues/client/footer.php');
?>
