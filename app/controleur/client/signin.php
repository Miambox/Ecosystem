<?php

include('app/model/client/requete.connexion.php');
include('app/model/client/requete.inscription.php');

switch ($action) {

    case 'information':

        $vue = "signin";
        $title = "Inscription";

        break;

    case 'securite':

        $vue = "password";
        $title = "Inscription";

        break;

     case 'valide':

        $vue = "home";
        $title = "home";
        if (isset($_POST['lastname']) &&
            isset($_POST['name']) &&
            isset($_POST['date']) &&
            isset($_POST['telephone']) &&
            isset($_POST['mail'])&&
            isset($_POST['mail_confirmation']) &&
            isset($_POST['password'])&&
            isset($_POST['password_confirmation'])&&
            isset($_POST['securityQuestion'])&&
            isset($_POST['securityResponse']))
            {
              $value = [
                'lastname' => $_POST['lastname'],
                'name' => $_POST['name'],
                'date' => $_POST['date'],
                'telephone' => $_POST['telephone'],
                'mail' => $_POST['mail'],
                'mail_confirmation' => $_POST['mail_confirmation'],
                'password' => $_POST['password'],
                'password_confirmation' => $_POST['password_confirmation'],
                'securityQuestion' => $_POST['securityQuestion'],
                'securityResponse' => $_POST['securityResponse']
              ];
              $request = inscription($bdd, $value);
              if($request) {
                header('Location: ?Route=client&Ctrl=profil&vuePrincipale');
              } else {
                header('Location: ?Route=client&profil');
              }
            }

        break;

    case 'connexion':
      $vue='home';
      if (isset($_POST['mdp']) && isset($_POST['email'])) {

        $mdp = $_POST['mdp'];
        $mdp = hash('sha256', $_POST['mdp']);
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
