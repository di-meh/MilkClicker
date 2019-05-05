<?php 

	require_once('controleur_connexion.php');

	class ModuleConnexion extends ModuleGenerique {

		/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
            On passe dans le switch pour savoir quelles fonctions nous utiliserons dans ce module 
        */
		function __construct() {

			$this -> controleur = new Controleur_Connexion();

			if(isset($_GET['action'])) {
				$action = htmlspecialchars($_GET['action']);
				switch ($action) {
					case 'inscription':
						$this->controleur->inscription();
						break;
					case 'connexion':
						$this->controleur->connexion();
						break;
					case 'deconnexion':
						$this->controleur->deconnexion();
						break;
					default:
						$this->controleur->connexion();
						break;
				}
			} else {
				$this->controleur->connexion();
			}
		}
	}
 ?>
