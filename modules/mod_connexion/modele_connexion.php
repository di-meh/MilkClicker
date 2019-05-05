<?php 

	class ModeleConnexion extends ModeleGenerique{	

		/*
            Cette fonction permet d'insérer dans la base de donnée le nouvel utilisateur
        */
		function inscription($pseudo, $mdp, $email) {
			$req = self::$connexion->prepare("INSERT INTO utilisateur(pseudo,mdp, email, estAdmin) VALUES (:pseudo,:mdp, :email,0)");
			$req->execute(array('pseudo' => $pseudo, 'mdp' => $mdp , 'email' => $email));
			$req->closeCursor();
		}

		/*
            Cette fonction permet de réccupérer dans la BD les membres actuels
        */
		function recupereMembres() {
			$req = self::$connexion->prepare("SELECT * FROM utilisateur");
			$req->execute();
			$membre = $req->fetchAll();

			return $membre;
		}

		/*
            Cette fonction permet de réccupérer l'id en fonction de l'email passé en paramètre
        */
		function recupereId($email) {
			$req = self::$connexion->prepare("SELECT id_utilisateur FROM utilisateur WHERE email = :email");
			$req->execute(array('email' => $email));
			$id = $req->fetch();
			return $id;
		}
	
		/*
            Cette fonction permet de créer une partie. Elle est activée lorsqu'un profil est créé
        */
		function creationPartie($id) {
			$req = self::$connexion->prepare("INSERT INTO `partie`(`id_partie`, `score`, `clef`) VALUES (:i,0,'0k1b5a2b15a3b100a4b1000a')");
			$req->execute(array('i' => $id));
			$req->closeCursor();
		}

		/*
            Cette fonction permet de réccupérer la clef de jeu de l'utilisateur qui se connecte
        */
		function recupereClef($id) {
			$req = self::$connexion->prepare("SELECT clef FROM partie WHERE id_partie = :i");
			$req->execute(array('i' => $id));
			$clef = $req->fetch();

			return $clef[0];
		}

		/*
            Cette fonction permet de savoir si l'utilisateur qui se connecte est un administrateur 
        */
		function estAdmin($id){
			$req = self::$connexion->prepare("SELECT estAdmin FROM utilisateur WHERE id_utilisateur = :id");
			$req->execute(array('id' => $id));
			$estAd = $req->fetch();
			var_dump($estAd);
			return $estAd;
		}
	}
?>
