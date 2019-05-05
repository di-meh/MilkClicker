<?php 

require_once('modele_connexion.php');
require_once('vue_connexion.php');

class Controleur_Connexion  extends ControleurGenerique {

	/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
    */
	function __construct() {
		parent::__construct(new ModeleConnexion(), new VueConnexion());
	}

	/*
            Cette fonction permet de tenter de se connecter une fois que le formulaire est envoyé
    */
	function connexion() {

		if(isset($_POST['email'])) {

			$membre = $this->modele->recupereMembres();

			foreach ($membre as $membre) {
				if ($membre['email'] == $_POST['email']) {

					$email = htmlspecialchars($_POST['email']);
					$mdp = $membre['mdp'];

					if(password_verify($_POST['mdp'], $mdp)) {

						$clef = $this->modele->recupereClef($membre['id_utilisateur']);

						$this->init_session($membre['id_utilisateur'], $membre['pseudo'], $membre['email'], $clef, $membre['estAdmin']);

						if ($membre['estAdmin'] == 1) {
							header('Location: index.php?module=admin');
						}						
						else{
							// Affiche la page Compte et met à jour le header
							header('Location: index.php?module=profil');
						}
					} else {
						$this->vue->vue_alerte("Mot de passe incorrect !");
						$this->vue->vue_connexion();
					}
				}
			}
			if (!isset($email)) {
				$this->vue->vue_alerte("L'adresse mail est incorrecte !");
				$this->vue->vue_connexion();
			}
		} else {
			$this->vue->vue_connexion();
		}
	}

	/*
            Cette fonction permet de créer un utilisateur et d'instancier sa connexion
    */
	function inscription() {
		if(isset($_POST['pseudo'])) {

			$membre = $this->modele->recupereMembres();

			// Vérification email déjà présent A FAIRE
			foreach ($membre as $membre) {
				
				if ($membre['email'] == $_POST['email']) {
					$this->vue->vue_inscription();
				}
			}

			$this->modele->inscription($_POST['pseudo'],password_hash($_POST['password'],PASSWORD_BCRYPT),$_POST['email']);

			$id = $this->modele->recupereId($_POST['email']);

			$this->modele->creationPartie($id['id_utilisateur']);

			$clef = $this->modele->recupereClef($id['id_utilisateur']);

			$this->init_session($id['id_utilisateur'], $_POST['pseudo'], $_POST['email'], $clef, 0);
		} else {
			$this->vue->vue_inscription();
		}
	}

	/*
            Cette fonction permet de mettre à jour la variable session avec les informations importantes qui serotn utilisées durant la session
    */
	function init_session($id_utilisateur,$pseudo, $email, $clef, $estAdmin) {
		$_SESSION['id_utilisateur'] = $id_utilisateur;
		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['email'] = $email;
		$_SESSION['clef'] = $clef;
		$_SESSION['estAdmin'] = $estAdmin;
	}
}
?>