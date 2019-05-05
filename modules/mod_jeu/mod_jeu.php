<?php 
require_once('controleur_jeu.php');

class ModuleJeu extends ModuleGenerique {
	/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
            On passe dans le switch pour savoir quelles fonctions nous utiliserons dans ce module 
    */
	function __construct() {
		parent::__construct(new ControleurJeu());
		if(isset($_GET['action'])) {

			$action = htmlspecialchars($_GET['action']);

			switch ($action) {
				case 'jeu':
				$this->controleur->afficherJeu();
				break;

				case 'postMessage':
				$this->controleur->postMessage();
				break;

				case 'getMessages':
				$this->controleur->getMessages();
				
				default:
				$this->controleur->afficherJeu();
				break;
			}
		} else {
			$this->controleur->afficherJeu();
		}
	}
}
?>