<?php
    class VueAdmin extends VueGenerique {

        /*
            Cette fonction est le constructeur qui hérite du module
            Vue générique pour les appels des fonctions de ce dernier 
        */
        function __construct() {
            parent::__construct("Admin");
        }

        /*
            Cette fonction affiche une erreur lors de la connection
        */
        function affichageInfoConnexion() {
            ?>
                <div class="alert alert-sucess" role="alert">
                    Il semble que vous ne soyez pas connectés, <a href="index.php?module=connexion" class="alert-link">cliquez ici</a> pour vous connecter ou créer votre compte.
                </div>
            <?php
        }
        
        /*
            Cette fonction permet d'afficher la page d'aministration
        */
        function afficherAdmin() {
            ?>


            <section class="page-section about-heading">
                <div class="container">
                    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about1.jpg" alt="">
                    <div class="about-heading-content">
                      <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                          <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                              <span class="section-heading-upper"><?php if(!isset($_SESSION['pseudo'])) {
                                echo "Mon Compte";
                            } else {
                                echo $_SESSION['pseudo'];
                            } ?></span>
                              <span class="section-heading-lower">Bienvenue sur la page admin.</span>
                            </h2>

                             <p class="mb-0">
                                 <a class="btn btn-default btn-lg" role="button" href="index.php?module=admin&action=afficherUt">Afficher les utilisateurs</a><br/>
                               
                            </p>
                            <p class="mb-0">
                                 <a class="btn btn-default btn-lg" role="button" href="index.php?module=admin&action=deconnexion">Se déconnecter</a><br/>
                               
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

            <?php
        }
    

     /*
        Cette fonction permet d'afficher le formulaire pour entrer l'id de l'utilisateur
    */
     function entrerID() {
            ?>


             <section class="page-section">
                <div class="container">
                  <div class="product-item">
                    <div class="product-item-title d-flex">
                      
                    </div>
                    
                    <div class="product-item-description d-flex mr-auto">
                      <div class="bg-faded p-5 rounded">
                         <form method="post" action="index.php?module=admin&action=recherche">
                                          
                                          <div class="top-margin">
                                            <label>Numéro de l'utilisateur<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="num" required>
                                          </div> 

                                          <div class="row">
                                            
                                            <div class="col-lg-4 text-right">
                                              <button class="btn btn-action" type="submit">Supprimer</button>
                                            </div>
                                          </div>
                                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>



            <?php
               

        }

    /*
            Cette fonction affiche l'utilisateur dont l'array a été réccupéré dans le modèle
    */
    function afficherUt($array) {
            ?>
             <section class="page-section">
                <div class="container">
                  <div class="product-item">
                    <div class="product-item-title d-flex">
                      
                    </div>
                   
                    <div class="product-item-description d-flex mr-auto">
                      <div class="bg-faded p-5 rounded">
                       <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>Id Utilisateur</th>
                        <th>Pseudo Utilisateur</th>
                        <th>Email Utilisateur</th>

                        <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $tab = $array; foreach ($tab as $utilisateur) {
                        echo "<tr>
                        <td>" . $utilisateur['id_utilisateur'] . "</td>" . "
                        <td>" . $utilisateur['pseudo'] . "</td>" . "
                        <td>" . $utilisateur['email'] . "</td>" . "<td><a href='index.php?module=admin&action=supprimerUt&id=" . $utilisateur['id_utilisateur'] . "'>Supprimer</a></td>" . "
                        </tr>";
                    }
                        
                        ?>
                    </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
              </section>



            <?php
            
        }

        /*
            Cette fonction affiche le formulaire de confirmation de suppression de l'utilisateur
        */
        function confirmDelete() {
            ?>

            <section class="page-section">
                <div class="container">
                  <div class="product-item">
                    <div class="product-item-title d-flex">
                      
                    </div>
                   
                    <div class="product-item-description d-flex mr-auto">
                      <div class="bg-faded p-5 rounded">
                       
                <article class="col-sm-8 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Utilisateur</h1>
                    </header>
                <h3>Utilisateur supprimé</h3>
                <a href="index.php?module=admin&action=afficherUt">Revenir au menu</a>
                </article>
            </div>
                    </div>
                  </div>
                </div>
              </section>


        <?php
        }
    }
?>