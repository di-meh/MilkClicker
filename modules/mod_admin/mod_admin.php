<?php
    require_once('controleur_admin.php');

    class ModuleAdmin extends ModuleGenerique {

        /*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
            On passe dans le switch pour savoir quelles fonctions nous utiliserons dans ce module 
        */
        function __construct() {
            parent::__construct(new ControleurAdmin());

            if (!isset($_SESSION['id_utilisateur']) || $_SESSION['estAdmin']==0) {
                $this->controleur->afficherConnexion();
            }
            else if (isset($_GET['action'])) {
                $action = htmlspecialchars($_GET['action']);
                switch($action) {
                    case 'recherche':
                    $this->controleur->rechercheUt();
                    break;
                    case 'deconnexion':
                        $this->controleur->deconnexion();
                        break;
                    case 'supprimerUt':
                        if(isset($_GET['id'])) {
                            $this->controleur->supprimerId($_GET['id']);
                        }
                    break;
                    case 'afficherUt':
                        $this->controleur->afficherUt();
                    break;
                    default:
                    $this->controleur->afficherAdmin();
                    break;
                }
            }else {
                $this->controleur->afficherAdmin();
            }
        }
    }
?>