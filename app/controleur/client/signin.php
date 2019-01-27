<?php

include('app/model/client/requete.connexion.php');
include('app/model/client/requete.inscription.php');

switch ($action) {

    // Vue permettant d'inscrire
     case 'inscription':
        $title = "Inscription";
        $vue = 'signin';

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
                'lastname'                => securitePourXSSFail($_POST['lastname']),
                'name'                    => securitePourXSSFail($_POST['name']),
                'date'                    => securitePourXSSFail($_POST['date']),
                'telephone'               => securitePourXSSFail($_POST['telephone']),
                'mail'                    => securitePourXSSFail($_POST['mail']),
                'mail_confirmation'       => securitePourXSSFail($_POST['mail_confirmation']),
                'password'                => securitePourXSSFail($_POST['password']),
                'password_confirmation'   => securitePourXSSFail($_POST['password_confirmation']),
                'securityQuestion'        => securitePourXSSFail($_POST['securityQuestion']),
                'securityResponse'        => securitePourXSSFail($_POST['securityResponse']),
              ];
              $request = inscription($bdd, $value);
              if($request) {
                header('Location: ?Route=client&Ctrl=profil&Vue=vuePrincipale');
              } else {
                header('Location: ?Route=client&signin');
              }
            }

        break;

    // Vue permettant de se connecter
    case 'connexion':
      $title = "Se connecter";
      $vue = 'home';


      if(isset($_POST['mdp']) && isset($_POST['email'])) {
        // $mdp = hash('sha256', $_POST['mdp']);
        $mdp = $_POST['mdp'];
        $user = connexion($_POST['email'], $mdp, $bdd);

        foreach ($user as $key => $value) {
          $_SESSION['nom'] = $value['nom'];
          $_SESSION['prenom'] = $value['prenom'];
          $_SESSION['id'] = $value['id'];
          $_SESSION['type'] = $value['type'];
          $_SESSION['date_naissance'] = $value['date_naissance'];
          $_SESSION['tel_portable'] = $value['tel_portable'];
          $_SESSION['mail'] = $value['mail'];
        }

        if(isset($_SESSION['id'])) {

          if($_SESSION['type'] != "utilisateur") {
            header('Location: ?Route=admin&Ctrl=general&Vue=general');
          } else {
            header('Location: ?Route=client&Ctrl=logement&Vue=vuePrincipale');
          }
        } else {
          $alerte = "Email ou mot de passe incorrecte.. Veuillez réessayer.";
        }
      } else {
        header('Location: ?Route=client&Ctrl=signin');
      }
    break;

    case 'deconnexion':
      session_destroy();
      header('Location: index.php');
    break;

    case 'mdpOublie':
      $title = "Récupération de mot de passe";
      $vue = "recupMdp";

      if(isset($_POST['email'])) {
        $mail_mdp = passwordForget($bdd, securitePourXSSFail($_POST['email']));
        if(sizeof($mail_mdp)) {
          foreach ($mail_mdp as $key => $value) {
            $message = "eh oh!";
            $to = "ecosystem-isep@outlook.fr";
            $subject = "Récupérer votre mot de passe";
            $message = 'Bonjour !';
            $headers = 'From: lucas.perrault@hotmail.com' . "\r\n";
            $request = mail($to, $subject, $message, $headers);
            if($request) {
              header('Location: index.php');
            } else {
              header('Location: ?Route=client&Ctrl=signin');
            }
          }
        } else {
          $alerte = "Le mail ne correspond pas à aucun autres.. Veuillez rééssayer !";
        }

      }
    break;

    default:
        $title = "error404";
        $vue = "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
