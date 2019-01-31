<?php

include('app/model/client/requete.profil.php');


switch ($action) {

    case 'vuePrincipale':

        $vue = "profil";
        $title = "Profil";
        $information_user = selectionnerInformationUserById($bdd);
        $liste_user_share_logement = selectionnerLogementWhichShare($bdd);

    break;

    case 'supprimerPartage':
      $vue = "profil";
      $title = "Profil";
      if(isset($_POST['id_user'])) {
        $id_user = securitePourXSSFail($_POST['id_user']);
        $request = supprimerPartage($bdd, $id_user);
        if($request) {
          header('Location: ?Route=client&Ctrl=profil&Vue=vuePrincipale');
        } else {
          header('Location: ?Route=client&Ctrl=profil');
        }
      } else {
        header('Location: ?Route=client&Ctrl=profil');
      }
    break;

    case 'editerProfil':
      $vue="signin";
      $title="Profil de l'utilisateur";
      $information_user = selectionnerInformationUserById($bdd);
    break;

    case 'updaterProfil':
      $vue="profil";
      $title="Profil utilisateur";
      if (isset($_POST['lastname']) &&
          isset($_POST['name']) &&
          isset($_POST['date']) &&
          isset($_POST['telephone']) &&
          isset($_POST['mail'])&&
          isset($_POST['password']))
          {
            $value = [
              'nom'                => securitePourXSSFail($_POST['lastname']),
              'prenom'                    => securitePourXSSFail($_POST['name']),
              'date_naissance'                    => securitePourXSSFail($_POST['date']),
              'tel_portable'               => securitePourXSSFail($_POST['telephone']),
              'mail'                    => securitePourXSSFail($_POST['mail']),
              'mot_de_passe'                => securitePourXSSFail(hash('sha256',$_POST['password'])),
            ];
            $request = updaterProfil($bdd, $value);
            if($request) {
              header('Location: ?Route=client&Ctrl=profil&Vue=vuePrincipale');
            } else {
              header('Location: ?Route=client&signin');
            }
          }

    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue= "erreur404";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
