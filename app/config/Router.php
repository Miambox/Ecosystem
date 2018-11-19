<?php
namespace ECOSYSTEM\app\config;
require 'app/controleur/partage/Controleur.php';
require 'app/controleur/admin/ControleurAdmin.php';
require 'app/controleur/client/ControleurClient.php';

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
