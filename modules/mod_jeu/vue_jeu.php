<?php
class VueJeu extends VueGenerique {
	
	/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
        */
	function __construct() {
		parent::__construct("Jeu");
	}

	/*
            Cette fonction affiche la page avec le jeu et le chat
        */
	function affichageJeu() {
		?>

		<div class="container">
			<div class="row">
				<div class="col">			
					<div class="" id ="canvasJeu">

					</div>
				</div>
				<div class="col">
					<section class="chat">
						<div class="messages">
						<!-- Affichage des messages pour le chat , traité par l'AJAX -->
						</div>
						<div class="user-inputs">
							<form action="index.php?module=jeu&action=postMessage" method="POST">
								<input type="text" id="content" name="contenu" placeholder="Saisissez votre message...">
								<button type="submit">Envoyer</button>
							</form>
						</div>

					</section>
				</div>
			</div>

		</div>
		<?php
	}
}
?>