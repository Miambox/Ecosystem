<?php 

include('app/model/requete.mentionsLegales.php');

switch ($action) {

  case 'mentionsLegales':

        $vue = "mentionsLegales";
        $title = "MentionsLegales";

        $messageMentionsLegales = selectionnerMentionsLegales($bdd);

        //var_dump($listeFAQ);

        if(isset($_POST['message']))  {

          $mentionsLegales = [

            'message'       => htmlspecialchars($_POST['message']),
          ];

          
         $request = insererMentionsLegales($bdd, $mentionsLegales); 

         if($request) {
              header('Location: ?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales');
            } else {
              var_dump("impossible d'ajouter le programme");
            }
          }

        
        break;
	 
  

     default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";

        
}


include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue.'.php');
include ('app/vues/admin/footer.php');
?>
