<?php

/*
  Démarage de la session et réccupération des cookies.
  Grâce à ça nous pouvons donc réccupérer la session précédente
  si elle n'a pas été fermée.
*/
session_start();
require_once('generique/modele_generique.php');
require_once('generique/vue_generique.php');
require_once('generique/controleur_generique.php');
require_once('generique/module_generique.php');

$connexion = new ModeleGenerique();
$connexion->init();

$nom_module = "accueil";

if(isset($_GET['module'])){

  $nom_module = htmlspecialchars($_GET['module']);
}

/*
  On fait un switch pour réccupérer le module interressé dans la barre url
  avec le $_GET
*/
switch ($nom_module) {

  case 'connexion':
  if(!isset($_SESSION['pseudo'])) {
    require_once('modules/mod_connexion/mod_connexion.php');
    $module = new ModuleConnexion();
  } else {
    header('Location: /index.php?module=compte');
  }
  break;

  case 'accueil':
  require_once('modules/mod_accueil/mod_accueil.php');
  $module = new ModuleAccueil();
  break;

  case 'jeu':
  require_once('modules/mod_jeu/mod_jeu.php');
  $module = new ModuleJeu();
  break;

  case 'admin':
  require_once('modules/mod_admin/mod_admin.php');
  $module = new ModuleAdmin();
  break;

  case 'profil':
  if(isset($_SESSION['pseudo'])) {
    require_once('modules/mod_profil/mod_profil.php');
    $module = new ModuleProfil();
  } else {
    header('Location: index.php?module=connexion');
  }
  break;

  default:
  require_once('modules/mod_accueil/mod_accueil.php');
  $module = new ModuleAccueil();
  break;
}


$content = $module->getAffichage();
require('template.php');

var_dump($_SESSION);
echo '<br/>';
var_dump($_POST);
?>
