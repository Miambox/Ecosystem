<?php

include('app/model/client/requete.connexion.php');
include('app/model/client/requete.inscription.php');

switch ($action) {

    // Vue permettant d'inscrire
     case 'inscription':
        $title = "Inscription";
        $vue = 'signin';

        if(isset($_POST['password'])) {
          $password = $_POST['password'];
          if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
            if (isset($_POST['lastname']) &&
                isset($_POST['name']) &&
                isset($_POST['date']) &&
                isset($_POST['telephone']) &&
                isset($_POST['mail'])&&
                isset($_POST['mail_confirmation']) &&
                isset($_POST['password'])&&
                isset($_POST['password_confirmation'])&&
                isset($_POST['securityQuestion'])&&
                isset($_POST['securityResponse']) &&
                isset($_POST["g-recaptcha-response"]))
                {
                  $password = $_POST['password'];
                  $value = [
                    'lastname'                => securitePourXSSFail($_POST['lastname']),
                    'name'                    => securitePourXSSFail($_POST['name']),
                    'date'                    => securitePourXSSFail($_POST['date']),
                    'telephone'               => securitePourXSSFail($_POST['telephone']),
                    'mail'                    => securitePourXSSFail($_POST['mail']),
                    'mail_confirmation'       => securitePourXSSFail($_POST['mail_confirmation']),
                    'password'                => hash('sha256', $password),
                    'password_confirmation'   => securitePourXSSFail($_POST['password_confirmation']),
                    'securityQuestion'        => securitePourXSSFail($_POST['securityQuestion']),
                    'securityResponse'        => securitePourXSSFail($_POST['securityResponse']),
                  ];
                  $request = inscription($bdd, $value);
                  if($request) {
                    header('Location: index.php');
                  } else {
                    header('Location: ?Route=client&signin');
                  }
                }
          }
          else {
            $alerte_mdp = "Votre mot de passe doit contenir au minimum: 1 Majuscule, 1 Miniscule, 1 caractère spécial, des chiffres et 8 caractères";
          }
        }

        break;

    // Vue permettant de se connecter
    case 'connexion':
      $title = "Se connecter";
      $vue = 'home';


      if(isset($_POST['mdp']) && isset($_POST['email'])) {
        // $mdp = hash('sha256', $_POST['mdp']);
        $mdp = hash('sha256', $_POST['mdp']);
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
      $enterMail = 0;
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
              header('Location: ?Route=client&Ctrl=signin&Vue=recupMdpDeux');
            } else {
              header('Location: ?Route=client&Ctrl=signin');
            }
          }
        } else {
          $alerte = "Le mail ne correspond pas à aucun autres.. Veuillez rééssayer !";
        }
      }
    break;

    case 'recupMdpDeux':
      $vue="recupMdp";
      $title= "Récupération de mot de passe";
      $enterMail = 1;
      if(isset($_POST["g-recaptcha-response"]) and
         isset($_POST['nom']) and
         isset($_POST['prenom']) and
         isset($_POST['question_securite']) and
         isset($_POST['reponse_securite'])) {

           $values = [
             'prenom' => securitePourXSSFail($_POST['prenom']),
             'nom' => securitePourXSSFail($_POST['nom']),
             'question_securite' => securitePourXSSFail($_POST['question_securite']),
             'reponse_securite' => securitePourXSSFail($_POST['reponse_securite'])
           ];

           $request = selectionnerMdp($bdd, $values);
           if($request) {
             foreach ($request as $key => $value) {
               $id_user = $value['id'];
               $enterMail = 2;
             }
           } else {
             $alerte = "Personne ne correspond à ces caractéristiques, veuillez rééssayer";
           }
      }
    break;

    case 'updaterMdp':
      $vue="recupMdp";
      $title= "Récupération de mot de passe";
      $enterMail =2;
      if(isset($_POST['password'])) {
        $password = $_POST['password'];
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
          $id_user = $_POST['id_user'];
          $password = $_POST['password'];
          $new_password = hash('sha256', $password);
          $request = updateMdp($bdd, $id_user, $new_password);
          if($request) {
            header('Location: index.php');
          } else {
            header('Location: ?Route=client&Ctrl=signin');
          }

        } else {
          $alerte_mdp = "Votre mot de passe doit contenir au minimum: 1 Majuscule, 1 Miniscule, 1 caractère spécial, des chiffres et 8 caractères";
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
