<?php
namespace ECOSYSTEM\app\config\managers;

class AdminSupremeManager {
 /*
  * Class Manager est utilisée pour générer une vue et un modèle de manière dynamique
  */
  public function getView($view) {
   /*
    * Cette fonction permet d'afficher une view
    * @param string $view Contient la vue que l'on veut générer
    */
		$path = ROOT_PATH . 'app/vues/adminsupreme/' . $view . '.php';
    if (is_file($path)) {
      require $path;
		}
    else {
      exit('The "' . $path . '" file doesn\'t exist');
		}
  }

  public function getModel($model) {
    /*
    * Cette fonction permet d'afficher un model.
    * @param string $model Contient le model que l'on veut générer
    */
		$path = ROOT_PATH . 'app/models/adminsupreme' .  $model . '.php';
    if (is_file($path)){
      require $path;
		}
    else {
      exit('The "' . $path . '" file doesn\'t exist');
		}
  }
}
