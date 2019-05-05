<?php

	require_once('modele_profil.php');
	require_once('vue_profil.php');

	class ControleurProfil  extends ControleurGenerique {

		/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
        */
		function __construct() {
			parent::__construct(new ModeleProfil(), new VueProfil());
		}

		/*
            Cette fonction permet de sauvegarder la clef d'utilisateur pour pouvoir conserver la progression de sa partie
        */
		function sauvegarde($kSave) {
			if($this->modele->pushSauvegardeKey($kSave, $_SESSION['id_utilisateur'])) {
				echo "La sauvegarde a échouée";
			} else {
				$_SESSION['clef'] = $kSave;
				header('Location: index.php?module=profil');
				echo "La sauvegarde est effectuée";
			}
		}

		/*
            Cette fonction permet de réccupérer les informations de la session et de les afficher en appellant la vue
        */
		function afficherProfil() {
			$utilisateur = $this->modele->recupereUtilisateur($_SESSION['id_utilisateur']);
			$aaa = 1;
			$this->vue->vue_profil($utilisateur, $aaa);
		}

		/*
            Cette fonction permet de mettre fin à la session en déconnectant l'utilisateur
        */
		function deconnexion() {
			session_destroy();
			header('Location: index.php');
		}

		/*
            Cette fonction permet d'appeller la vue pour afficher la suppression du profil
        */
		function suppression() {
			$this->vue->afficherSupp();
		}

		/*
            Cette fonction permet d'afficher dans la vue la confirmation de la suppression du profil
        */
		function confirmerSuppression() {
			$this->modele->supprimer($_SESSION['id']);
		}
		
		
	}
?>