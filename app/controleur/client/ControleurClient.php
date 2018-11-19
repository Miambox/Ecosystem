<?php
namespace ECOSYSTEM\App\Controleur\client;

class ControleurClient {
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
		$this->_manager->getView('home');
  }

	public function mentionLegale() {
		$this->_manager->getView('mentionLegale');
	}

	public function gestionLogements() {
		$this->_manager->getView('gestion/logement');
	}

	public function gestionPieces() {
		$this->_manager->getView('gestion/piece');
	}

	public function gestionCapteurs() {
		$this->_manager->getView('gestion/capteur');
	}

	public function notFound() {
    $this->_manager->getView('erreur404');
  }
}
