<?php
namespace ECOSYSTEM\app\config;
// CLIENT
require 'app/controleur/client/login.php';
require 'app/controleur/client/logement.php';
require 'app/controleur/client/piece.php';
require 'app/controleur/client/capteur.php';
require 'app/controleur/client/general.php';
require 'app/controleur/client/detailsCapteur.php';
require 'app/controleur/client/profil.php';
require 'app/controleur/client/signin.php';
require 'app/controleur/client/password.php';
require 'app/controleur/client/addLogement.php';
require 'app/controleur/client/addPiece.php';
require 'app/controleur/client/addCapteur.php';


// ADMINISTRATEUR
require 'app/controleur/admin/general.php';
// ADMINISTRATEUR supreme
require 'app/controleur/adminsupreme/general.php';

class Router {
    /**
   * Cette classe permet de créer des routes dynamiquement
   * "C'est le gestionnaire de chargement des contrôleurs"
   */
    public static function run (array $params) {
      /*
      * Fonction "run". Permet d'instancier un nouveau contrôleur.
      */
      $controllerFolder = $params['route'];
      $namespace = 'ECOSYSTEM\app\controleur\\'. $controllerFolder . '\\' ; // Chemin contenant le contrôleur.
      $controllerName = $params['ctrl'];  // Nom du contrôleur.
      $controllerPath = ROOT_PATH . '/app/controleur/' . $controllerFolder . '/';   // Chemin à partir du dossier serveur jusqu'à la classe.
      $controller = $namespace . $controllerName; // La classe du contrôleur à instancier
      // is_file(): Test si le paramètre passé est un fichier.
      if (is_file($controllerPath . $controllerName . '.php')) {
        $controllerNew = new $controller;               // Instanciation de la classe Controleur
        // Permet de tester l'existance de la méthode dans la classe du Controleur.
        if ((new \ReflectionClass($controllerNew))->hasMethod($params['vue']) && (new \ReflectionMethod($controllerNew, $params['vue']))->isPublic()) {
          call_user_func(array($controllerNew, $params['vue'])); // Permet d'appeler la méthode à partir du string contenu dans les parmètres.
        }
        else {
          $controllerNew->notFound(); // Appel de la fonction notFound.
			  }
      }
      else {
        $controllerNew = new $controller; // Instanciation de la classe Controleur
        $controllerNew->notFound(); // Appel de la Fonction notFound.
      }
    }
}
