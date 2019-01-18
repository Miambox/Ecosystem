<?php
namespace ECOSYSTEM;
use ECOSYSTEM\app;
session_start();

ini_set('display_errors', 1);

//More information on the global variable $_SERVER here ->
	//http://php.net/manual/en/reserved.variables.server.php , or here ->
	//http://www.w3resource.com/php/super-variables/$_SERVER.php
// If the script was queried through a secure HTTP protocol, $_SERVER['HTTPS'] is set to a non-empty value.
if(isset($_SERVER["HTTPS"])&& strtolower($_SERVER["HTTPS"]) == "on" ) { $protocol = 'https://'; } else {
	$protocol = 'http://';
}


// MISE EN PLACE DES ROUTES.
define('PROTOCOL', $protocol);
define('ROOT_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('ROOT_HOME', str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('ROOT_PATH', __DIR__ . '/');


// Remplissage d'un tableau ayant pour clé 'route' pour le choix du dossier du Controleur.
if(!empty($_GET['Route'])) {
	$route = $_GET['Route'];
} else {
	$route = 'client';
}

// Remplissage d'un tableau ayant pour clé 'Ctrl' pour Choix de Contrôleur.
// Exemple: Si on dit que p=ControlleurAdmin alors la variable vaudra ce controleur (cf:header.php)
if(!empty($_GET['Ctrl'])) {
	$controller = $_GET['Ctrl'];
} else {
	$controller = 'general'; // On initialise le contrôleur de base.
}

// Remplissage d'un tableau ayant pour clé 'Vue' pour le Choix de la vue
if(!empty($_GET['Vue'])){
    $action = $_GET['Vue'];
} else {
	$action = 'home'; // On initialise la vue de base.
}

// On stocke les valeurs choisies du contrôleurs et de l'action.
$params = [
	'route' => $route,
	'ctrl' => $controller,
	'vue' => $action
];

include('app/controleur/' . $route . '/' . $controller . '.php');
?>
