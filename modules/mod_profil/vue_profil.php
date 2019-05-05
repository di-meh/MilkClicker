<?php

class VueProfil extends VueGenerique {

	/*
            Cette fonction est le constructeur qui hérite du module
            générique pour les appels des fonctions de ce dernier
   	*/
	function __construct()
	{
		parent::__construct("Compte");
	}

	/*
            Cette fonction affiche le profil de l'utilisateur actif
        */
	function vue_profil($trajet, $comm) {
		?>      



    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Mon Compte</span>
                <span class="section-heading-lower">
                	<?php if(!isset($_SESSION['pseudo'])) {
								echo "Mon Compte";
							} else {
								echo $_SESSION['pseudo'];
							} ?>
					</span>
					

              </h2>
             	
				<h4 class="page-header">Vos informations</h4>
				<ul class="list-unstyled list-spaces">
				<li><p>Email : <?php echo $_SESSION['email'];?></p></li><br>
				
				<li>
					<form method="post" action="index.php?module=profil&action=deconnexion">
	                  <div class="row">
	                    <div class="col-lg-4 text-right">
	                      <button class="btn btn-action" type="submit">Se déconnecter</button>
	                    </div>
	                  </div>
	                </form>
				<li>
					<form method="post" action="index.php?module=profil&action=suppression">
	                  <div class="row">
	                    <div class="col-lg-4 text-right">
	                      <button class="btn btn-action" type="submit">Supprimer mon compte</button>
	                    </div>
	                  </div>
	                </form>
				</ul>
				
            </div>
          </div>
        </div>
      </div>
    </section>

				<?php
			}

			/*
            Cette fonction permet d'afficher la suppression du profil
        */
			function afficherSupp() {
				?>

				<div class="container">

					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">Supprimer mon compte</li>
					</ol>

					<header class="page-header">
                        <h1 class="page-title">Supprimer mon compte</h1>
                    </header>
					<br>
					<div class="row">
						<!-- Article main content -->
						<article class="col-sm-12 maincontent">
							<p>Etes vous sur de vouloir supprimer votre compte ?</p>
							<br>
							<a class="btn btn-default btn-lg" role="button" href="index.php?module=compte">Annuler</a>
							<a class="btn btn-default btn-lg" role="button" href="index.php?module=compte&action=supprimer">Supprimer mon compte</a>
						</article>
						<!-- /Article -->

					</div>
				</div>	<!-- /container -->
				<?php
			}

		}
?>