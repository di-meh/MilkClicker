<?php

    class ModeleAdmin extends ModeleGenerique {
         
        /*
            Cette fonction permet de récupérer la liste des utilisateurs présents dans la base de donnée
        */
        function Liste(){

    		$req = self::$connexion->prepare("SELECT * FROM utilisateur");
			$req->execute();
			$membre = $req->fetchAll();

			return $membre;
    	}

        /*
            Cette fonction permet de supprimer un utilisateur de la base de donnée grâce à l'id envoyé en paramètre
        */
    	function deleteUt($id) {
            $reqDelete = self::$connexion->prepare("DELETE from utilisateur where id_utilisateur= :id");
            $reqDelete->execute(array('id' => $id));
        }

        /*
            Cette fonction permet de rechercher toutes les informations d'un utilisateur dans la base de donnée
            grâce à l'identifiant envoyé dans la fonction en paramètre
        */
        function chercherUt($id) {
            $req = self::$connexion->prepare("SELECT * from utilisateur where id_utilisateur = :id");
            $req->execute(array('id' => $id));
            $res = $req->fetchAll();
            return $res;
        }
    }

?>