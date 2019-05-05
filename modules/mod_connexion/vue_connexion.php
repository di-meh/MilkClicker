<?php 

class VueConnexion extends VueGenerique {

    /*
    Cette fonction est le constructeur qui hérite du module
    générique pour les appels des fonctions de ce dernier
    */
    function __construct() {
        parent::__construct("Connexion");
    }


    /*
            Cette fonction affiche la page de connexion avec le formulaire
        */
            function vue_connexion() {
                ?>      

                <section class="page-section">
                    <div class="container">
                      <div class="product-item">
                        <div class="product-item-title d-flex">
                          <div class="bg-faded p-5 d-flex ml-auto rounded">
                            <h2 class="section-heading mb-0">
                              <span class="section-heading-upper">Connexion</span>
                              <span class="section-heading-lower">Connectez vous à votre compte</span>
                          </h2>
                      </div>
                  </div>

                  <div class="product-item-description d-flex mr-auto">
                      <div class="bg-faded p-5 rounded">
                        <p class="mb-0">Si vous n'avez pas encore de compte, <a href="index.php?module=connexion&action=inscription">inscrivez-vous !</a></p>

                        <form method="post" action="index.php?module=connexion&action=connexion">
                          <div class="top-margin">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="top-margin">
                            <label>Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="mdp" required>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-8">
                              <b><a href="">Mot de passe oublié ?</a></b>
                          </div>
                          <div class="col-lg-4 text-right">
                              <button class="btn btn-action" type="submit">Connexion</button>
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
            Cette fonction affiche la page pour s'inscrire avec le formulaire
        */
function vue_inscription() {
    ?>


    <section class="page-section">
        <div class="container">
          <div class="product-item">
            <div class="product-item-title d-flex">
              <div class="bg-faded p-5 d-flex ml-auto rounded">
                <h2 class="section-heading mb-0">
                  <span class="section-heading-upper">Inscription</span>
                  <span class="section-heading-lower">Créez votre compte</span>
              </h2>
          </div>
      </div>
      <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-01.jpg" alt="">
      <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Si vous avez déjà un compte, <a href="index.php?module=connexion">connectez-vous</a> à celui-ci.</p>

            <form method="post" action="index.php?module=connexion&action=inscription">

              <div class="top-margin">
                <label>Pseudo <span class="text-danger">*</span></label>
                <input type="text" name="pseudo" class="form-control" required>
            </div>
            <div class="top-margin">
                <label>Adresse mail <span class="text-danger">*</span></label>
                <input type="text" name="email" class="form-control" required>
            </div>

            <div class="row top-margin">
                <div class="col-sm-6">
                  <label>Mot de passe <span class="text-danger">*</span></label>
                  <input type="password" name="password" class="form-control" required>
              </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-lg-8">
              <label class="checkbox">
                <input type="checkbox"> 
                I have read the <a href="page_terms.html">Terms and Conditions</a>
            </label>                        
        </div>
        <div class="col-lg-4 text-right">
          <button class="btn btn-action" type="submit">Inscription</button>
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
            Cette fonction affiche un message d'erreur si il y a un problème de connexion
        */
function vue_alerte($message) {

    ?>

    <div class="container">
      <div class="row error">
       <h4 class="thin text-center"><?php echo $message; ?></h4>
   </div>
</div>
<?php 

}
}

?>
