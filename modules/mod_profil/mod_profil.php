<?php
	require_once('controleur_profil.php');

	class ModuleProfil extends ModuleGenerique {

		/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
            On passe dans le switch pour savoir quelles fonctions nous utiliserons dans ce module 
        */
		function __construct() {

			parent::__construct(new ControleurProfil());

			if(isset($_GET['action'])) {

				$action = htmlspecialchars($_GET['action']);

				switch ($action) {
					case 'sauvegarde':
						if(isset($_GET['ks'])){
							$this->controleur->sauvegarde($_GET['ks']);
						} else {
							$this->controleur->afficherProfil();
						}
					break;
					case 'deconnexion':
						$this->controleur->deconnexion();
						break;
					case 'suppression':
						$this->controleur->suppression();
						break;
					case 'supprimer':
						$this->controleur->confirmerSuppression();
						session_destroy();
						header('Location: index.php?');
						break;
					default:
						$this->controleur->afficherProfil();
						break;
				}
			} else {
				$this->controleur->afficherProfil();
			}
		}
	}
 ?>