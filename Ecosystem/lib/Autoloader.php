<?php
namespace ECOSYSTEM\lib;

/**
 * Class Autoloader
 */
class Autoloader {
    static function init() {
        // Méthode permettant d'appeler une classe automatiquement lorsqu'elle est intanciée.
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @param string $class: Nom de la classe qui va s'auto-charger.
     */
    static function autoload($class){
        // Remove namespace and backslash
        echo($class);
        $class = str_replace(array(__NAMESPACE__, 'ECOSYSTEM\app', DIRECTORY_SEPARATOR), '/', $class);
        echo($class);

        if (is_file(__DIR__ . '/' . $class . '.php')) {
            require_once(__DIR__ . '/' . $class . '.php');
		}
        if (is_file(ROOT_PATH . $class . '.php')) {
            require_once(ROOT_PATH . $class . '.php');
		}
    }

}
