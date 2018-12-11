<?php
namespace ECOSYSTEM\App\Controleur\client;

class piece {

  protected $_manager;
	protected $_content;

  public function __construct() {
		require 'app/config/managers/ClientManager.php';
    // Constructeur du contrôleur
		// $this->manager->getModel('Content');
		// $this->_content = new Content;
    $this->_manager = new \ECOSYSTEM\app\config\managers\ClientManager;
  }

  public function vuePrincipale() {
    $this->_manager->getView('header');
    $this->_manager->getView('gestion/piece');
    $this->_manager->getView('footer');
  }

  public function notFound() {
    $this->_manager->getView('erreur404');
  }
}
?>
