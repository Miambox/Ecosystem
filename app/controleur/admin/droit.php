<?php
// Connexion a la base de donnees
include('app/model/admin/requete.droit.php');

switch ($action) {

    // Vue des droits du super-administrateur
    case 'vuePrincipale':
        $vue                = "droit";
        $title              = "Droits du SUPER-ADMIN";
        $liste_utilisateur  = selectionnerEmployers($bdd);
    break;

    // Vue permettant d'ajouter un employé en tant qu'utilisateur
    case 'inscrireUtilisateur':
      $vue        = "droit";
      $title      = "Les droits";

      if (isset($_POST['nom']) &&
          isset($_POST['prenom']) &&
          isset($_POST['mail']) &&
          isset($_POST['password']) &&
          isset($_POST['type']))
          {
            $value = [
              'nom'       => securitePourXSSFail($_POST['nom']),
              'prenom'    => securitePourXSSFail($_POST['prenom']),
              'type'      => securitePourXSSFail($_POST['type']),
              'mail'      => securitePourXSSFail($_POST['mail']),
              'password'  => securitePourXSSFail($_POST['password'])
            ];
            $request = inscrireEmployers($bdd, $value);
            if($request) {
              header('Location: ?Route=admin&Ctrl=droit&Vue=vuePrincipale');
            } else {
              header('Location: ?Route=admin&Ctrl=droit');
            }
          } else {
            header('Location: ?Route=admin&Ctrl=droit');
          }
    break;

    // Vue permettant de supprimer un employé
    case 'supprimerEmploye':
      $title      ="Les droits";
      $vue        ="droit";

      if(isset($_POST['id_user'])) {
        $request = supprimerEmployers($bdd, securitePourXSSFail($_POST['id_user']));
        if($request) {
          header('Location: ?Route=admin&Ctrl=droit&Vue=vuePrincipale');
        } else {
          header('Location: ?Route=admin&Ctrl=droit');
        }
      } else {
        header('Location: ?Route=admin&Ctrl=droit');
      }
    break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "error404";
        $vue = "erreur404";
}

// Affichage du header et du footer
include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue. '.php');
include ('app/vues/admin/footer.php');
