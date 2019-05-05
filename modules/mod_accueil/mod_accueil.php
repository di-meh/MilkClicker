<?php 
	require_once('controleur_accueil.php');

	class ModuleAccueil extends ModuleGenerique {

		/*
			Cette fonction est le constructeur qui hérite du module
			générique pour les appels des fonctions de ce dernier
			et on appel ensuite une fonciton du controleur
		*/
		function __construct() {
			parent::__construct(new ControleurAccueil());
			$this->controleur->afficherAccueil();
		}
	}
?>