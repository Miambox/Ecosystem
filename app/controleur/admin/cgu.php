<?php

include('app/model/admin/requete.cgu.php');

switch ($action) {

  // Vue des cgu
  case 'cgu':
        $vue                      = "cgu";
        $title                    = "CGU";
        $edit = 0;
        $messageCGU   = selectionnerCGU($bdd);

        if(isset($_POST['message']))  {
          if($_POST['message'] != "") {
            $cgu = [
              'message'       => $_POST['message'],
            ];
           $request = insererCGU($bdd, $cgu);
           if($request) {
                header('Location: ?Route=admin&Ctrl=cgu&Vue=cgu');
              } else {
                header('Location: ?Route=admin&Ctrl=cgu&Vue=cgu');
            }
          }
        }
    break;

    case 'editCGU':
      $vue            = "cgu";
      $title          = "CGU";
      $edit = 1;
      $messageCGU   = selectionnerCGU($bdd);
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
