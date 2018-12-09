<?php
namespace ECOSYSTEM\App\Controleur\client;

class general {
 /*
  * Class Controleur
  */
	protected $_manager;
	protected $_content;

  public function __construct() {
		require 'app/config/managers/ClientManager.php';
    // Constructeur du contrôleur
		// $this->manager->getModel('Content');
		// $this->_content = new Content;
    $this->_manager = new \ECOSYSTEM\app\config\managers\ClientManager;
  }

	public function home() {
		$this->_manager->getView('header');
		$this->_manager->getView('home');
		$this->_manager->getView('footer');
  }

	public function mentionLegale() {
		$this->_manager->getView('header');
		$this->_manager->getView('mentionLegale');
		$this->_manager->getView('footer');
	}

	public function notFound() {
    $this->_manager->getView('erreur404');
  }
}
