<?php

	class ModeleProfil extends ModeleGenerique {

		/*
            Cette fonction réccupère l'utilisateur en fonction de l'id passé en paramètre
        */
		function recupereUtilisateur($id) {
			$req = self::$connexion->prepare("SELECT * FROM utilisateur WHERE idUser = :id");
			$req->execute(array('id' => $id));
			$utili = $req->fetchAll();
			return $utili;
		}

		/*
            Cette fonction permet de supprimer l'utilisateur en fonction de l'id passé en paramètre 
        */
		function supprimer($id) {
			$this->supprimerAnnonces($id);
			$req = self::$connexion->prepare("DELETE FROM user WHERE idUser = :id;");
			$req->execute(array('id' => $id));
		}

		/*
            Cette fonction permet de sauvegarder la clef de jeu en la remplaçant dans la BD
        */
		function pushSauvegardeKey($kSave, $id) {
			$req = self::$connexion->prepare("UPDATE `partie` SET `clef`=:k WHERE `id_partie` = :i");
			$req->execute(array('i' => $id, 'k' => $kSave));
			}
	}
?>