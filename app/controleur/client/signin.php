<?php

include('app/model/client/requete.connexion.php');

switch ($action) {

    case 'information':

        $vue = "signin";
        $title = "Inscription";

        break;

    case 'securite':

        $vue = "password";
        $title = "Inscription";

        break;

    case 'connexion':
      $vue='home';
      if (isset($_POST['mdp']) && isset($_POST['email'])) {
        //@Todo: A enlever lorsque le mot de passe
        $mdp = $_POST['mdp'];
        // @Todo: Il faut que Antoien has les mdp
        // $mdp = hash('sha256', $_POST['mdp']);
        $user = connexion($_POST['email'],$mdp, $bdd);

        if($user){
          $_SESSION['user']=$user;
          header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
          exit();
        } else{
          header('Location: ?index.php');
          exit();
        }
      }
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
