<?php
class VueAccueil extends VueGenerique {

    /*
        Cette fonction est le constructeur qui hérite de la vue
        générique pour les appels des fonctions de ce dernier
    */
	function __construct() {
		parent::__construct("Accueil");
	}

    /*
        Cette fonction permet d'afficher la page d'accueil avec les informations utiles
    */
	function vue_accueil() {
		?>
      <section class="page-section clearfix">
        <div class="container">
          <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Fresh Coffee</span>
                <span class="section-heading-lower">Bienvenue sur notre jeu</span>
            </h2>
            <p class="mb-3">Le meilleur jeu, après cookie clicker!<br>
                Créé et programmé par Arthur Vadrot, Steven Quiot, Medi Saber et Justine Juarez.
            </p>
         <!-- <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
        </div>-->
    </div>
</div>
</div>
</section>

<section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Les règles</span>
              <span class="section-heading-lower">Du Jeu</span>
          </h2>
          <p class="mb-0">Cliquez autant de fois que vous le pouvez pour produire un maximum de lait! </p>
      </div>
  </div>
</div>
</div>
</section>

<?php
}

}
?>