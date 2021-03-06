<?php
// Connexion a la base de donnees
include('app/model/admin/general.php');

switch ($action) {

    // Vue general de l'administrateur
    case 'general':
        $vue = "general";
        $title = "EcoSystem";
        if(!isset($_SESSION['id'])) {
          header('Location: ?Route=admin&Ctrl=general');
        }
    break;

    // Liste des clients de la barre de recherche
    case 'listeClient':
        $vue = "listeClient";
        $title = "Liste des clients";
        // Nom entre dans la barre de recherche
        $nomClient = $_POST['nomClient'];
        // Fonction de app/model/admin/general.php
        if(clientExiste($bdd, $nomClient)!=0) {
            $affiche = 'oui';
        }
        else {
            $affiche = 'non';
        }
    break;

    case 'cgu':
      $vue="cgu";
      $title="cgu";
    break;

    case 'addTypeSensor':
        $vue="addTypeSensor";
        $title="Configuration de capteur";
    break;
    
    case 'deleteUser':
        $vue = 'deleteUser';
        $title = 'Supprimer un client';
        $mdp = $_POST['mdp-admin'];
        $id = $_POST['id-client'];

        $trueMdp = mdpCorrect($bdd,$id)->fetch();
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title  = "error404";
        $vue    = "erreur404";
}

// Affichage du header et du footer
include ('app/vues/admin/header.php');
include ('app/vues/admin/'.$vue. '.php');
include ('app/vues/admin/footer.php');
