<?php 
	require_once('modele_accueil.php');
	require_once('vue_accueil.php');

	class ControleurAccueil extends ControleurGenerique {

		/*
			Cette fonction est le constructeur qui hérite du controleur
			générique pour les appels des fonctions de ce dernier
		*/
		function __construct() {
			parent::__construct(new ModeleAccueil(), new VueAccueil());
		}
		
		/*
			Cette fonction permet d'appeler l'affichage de la vue de
			l'accueil
		*/
		function afficherAccueil() {
			$this->vue->vue_accueil();
		}

	}
?>