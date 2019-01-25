<?php

// @ Todo: En cours de développement, prêt pour la présentation

include('app/model/admin/requete.faq.php');

switch ($action) {
  // Vue permettant de visualiser la FAQ
  case 'faq':
      $vue        = "faq";
      $title      = "FAQ";
      $edit = 0;
      $listeFAQ   = selectionnerFAQ($bdd);
      if(isset($_POST['question']) and isset($_POST['reponse']))
      {
          $faq = [
            'question'       => htmlspecialchars($_POST['question']),
            'reponse'   => $_POST['reponse'],
          ];
          $request   = insererFAQ($bdd, $faq);
          if($request) {
              header('Location: ?Route=admin&Ctrl=faq&Vue=faq');
          } else {
          }
      } else if(isset($_POST['reponse_edit']) AND isset($_POST['question_edit'])) {
        $id_faq = securitePourXSSFail($_POST['id_faq']);
        $faq = [
          'question' => securitePourXSSFail($_POST['question_edit']),
          'reponse'   => $_POST['reponse_edit']
        ];
        $request = updateFAQ($bdd, $id_faq, $faq);
        if(!$request) {
          header('Location: ?Route=admin&Ctrl=faq');
        } else {
          header('Location: ?Route=admin&Ctrl=faq&Vue=faq');
        }
      }
    break;

    case 'editerFaq':
      $vue        = "faq";
      $title      = "FAQ";
      $edit = 1;
      if(isset($_POST['id_faq']))  {
        $id_faq = securitePourXSSFail($_POST['id_faq']);
        $listeFAQ   = selectionnerFAQ($bdd);
        $listeFAQByID = selectionnerFAQByID($bdd, $id_faq);
      }
    break;

    case 'supprimerFaq':
      $vue        = "faq";
      $title      = "FAQ";
      if(isset($_POST['id_faq']))  {
        $id_faq = securitePourXSSFail($_POST['id_faq']);
        $request = supprimerFaq($bdd, $id_faq);
        if($request) {
          header('Location: ?Route=admin&Ctrl=faq&Vue=faq');
        } else {
          header('Location: ?Route=admin&Ctrl=faq');
        }
      } else {
        header('Location: ?Route=admin&Ctrl=faq');
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
