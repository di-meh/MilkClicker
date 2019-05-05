<?php

    require_once('modele_admin.php');
    require_once('vue_admin.php');


    class ControleurAdmin extends ControleurGenerique {
        /*
            Cette fonction est le constructeur qui hérite du module
            controleur pour les appels des fonctions de ce dernier 
        */
        function __construct() {
            parent::__construct(new ModeleAdmin(), new VueAdmin());
        }

        /*
            Cette fonction appelle la vue pour afficher les informations de connexion
        */
        function afficherConnexion() {
            $this->vue->affichageInfoConnexion();
        }

        /*
            Cette fonction appelle la vue pour afficher la page d'administration
        */
        function afficherAdmin() {
            $this->vue->afficherAdmin();
        }

        /*
            Cette fonction permet de réccupérer l'id de l'utilisateur et d'afficher les informations de l'utilisateur
        */
        function rechercheUt(){
            $id = $_POST['num'];
            $result = $this->modele->chercherUt($id);
            $this->vue->afficherUt($result);
        }

        /*
            Cette fonction permet de se déconnecter de la session d'administrateur
        */
        function deconnexion() {
            session_destroy();
            header('Location: index.php');
        }

        /*
            Cette fonction permet de supprimer l'utilisateur dont l'id est passé en paramètre et d'afficher la confirmation de suppression
        */
        function supprimerId($id) {
            $this->modele->deleteUt($id);
            $this->vue->confirmDelete();
        }

        /*
            Cette fonction appelle la vue pour afficher le formulaire pour saisir l'id d'un utilisateur
        */
        function afficherUt() {
            $this->vue->entrerID();
        }
    }
?>