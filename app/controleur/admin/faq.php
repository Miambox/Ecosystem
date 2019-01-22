<?php
include('app/model/requete.faq.php');

switch ($action) {
  // Vue permettant de visualiser la FAQ
  case 'faq':
      $vue        = "faq";
      $title      = "FAQ";
      $listeFAQ   = selectionnerFAQ($bdd);
      if(isset($_POST['type']) and isset($_POST['question']) and isset($_POST['reponse']) and (($_POST['id_utilisateur']) ==3))  {
        $faq = [
          'type'       => htmlspecialchars($_POST['type']),
          'question'   => htmlspecialchars($_POST['question']),
          'reponse'    => htmlspecialchars($_POST['reponse']),
          'id_utilisateur'  => htmlspecialchars($_POST['id_utilisateur']),
        ];
       $request   = insererFAQ($bdd, $faq);
       if($request) {
            header('Location: ?Route=admin&Ctrl=faq&Vue=faq');
          } else {
            header('Location: ?Route=admin&Ctrl=faq');
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
