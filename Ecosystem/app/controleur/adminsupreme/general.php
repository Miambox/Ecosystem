<?php
namespace ECOSYSTEM\App\Controleur\adminsupreme;

class general {
 /*
  * Class Controleur
  */
	protected $_manager;
	protected $_content;

  public function __construct() {
		require 'app/config/managers/AdminSupremeManager.php';
    // Constructeur du contrôleur
		// $this->manager->getModel('Content');
		// $this->_content = new Content;
    $this->_manager = new \ECOSYSTEM\app\config\managers\AdminSupremeManager;
  }

	public function home() {
		$this->_manager->getView('home');
  }

	public function notFound() {
    $this->_manager->getView('erreur404');
  }
}
