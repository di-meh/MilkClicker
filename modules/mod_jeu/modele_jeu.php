<?php 
class ModeleJeu extends ModeleGenerique {
	/*
            Cette fonction permet de réccupérer les messages envoyés en demandant les derniers messages à la BD
        */
	function getMessages(){

  // 1. Requête auprès de la base de données pour sortir les 20 derniers messages
		$resultats = self::$connexion->query("SELECT * FROM messages ORDER BY dateMessage DESC LIMIT 20");
		$messages = $resultats->fetchAll();
  // 3. Données sous format json affichées 
		var_dump($messages);
		echo json_encode($messages);
	}

	/*
            Cette fonction permet d'envoyer un message 
        */
	function postMessage($id_utilisateur,$pseudo,$contenu){

		
  // Requête pour insérer les données dans la base de données . En l'occurrence les messages.
		$query = self::$connexion->prepare('INSERT INTO messages SET id_utilisateur = :id_utilisateur, pseudo=:pseudo ,contenu = :contenu, dateMessage = NOW()');

		$query->execute([
			"id_utilisateur" => $id_utilisateur,
			"pseudo" => $pseudo,
			"contenu" => $contenu
		]);
//Si effectué avec succès :
		echo json_encode(["status" => "success"]);
	}
}
?>