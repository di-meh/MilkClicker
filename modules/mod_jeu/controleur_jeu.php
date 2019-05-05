<?php 
require_once('modele_jeu.php');
require_once('vue_jeu.php');

class ControleurJeu extends ControleurGenerique {

	/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
	*/
	function __construct() {
		parent::__construct(new ModeleJeu(), new VueJeu());
	}

	/*
            Cette fonction appelle la vue qui va afficher le jeu 
        */
	function afficherJeu() {
		$this -> vue -> affichageJeu();
	}

	/*
            Cette fonction permet d'envoyer un message dans le chat online en appelant la méthode postMessage(arg1, arg2) du modèle 
        */
	function postMessage(){
		$id_utilisateur = $_SESSION['id_utilisateur'];
 	 	$pseudo = $_POST['pseudo'];
  		$contenu = $_POST['contenu'];
		$this -> modele -> postMessage($id_utilisateur,$pseudo,$contenu);
	}

	/*
            Cette fonction permet de réccupérer les messsages en passant par le modèle
        */
	function getMessages(){
		$this -> modele -> getMessages();
	}
}
?>