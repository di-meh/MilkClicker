<?php 
	
	class ModeleGenerique
	{
		 
		private static $dns;
		private static $user;
		private static $password;
	 	protected static $connexion;
		
	 	function __construct(){
			 self::$dns = "mysql:host=localhost;dbname=jeu";
			 self::$user = "root";
			 self::$password = "";
			 self::$connexion = self::init();
		}

		function init(){
			self::$connexion = new PDO(self::$dns, self::$user, self::$password);
			self::$connexion->query('SET NAMES utf8');
			return self::$connexion;
		}

	}
	

 ?>
