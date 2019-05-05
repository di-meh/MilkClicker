<!-- Ce template nous permet de charger le footer ainsi que le header
    dans la vue. Cette technique nous permet de changer le tampon
    lorsqu'il y a un changement de variables comme $_SESSION
 -->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MilkyClicker</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/chat.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">


  <script type="text/javascript" src="chat.js"></script>
  <script src="p5/p5.min.js"></script>
  <script src="p5/addons/p5.dom.min.js"></script>
  <script src="p5/addons/p5.sound.min.js"></script>

  <script src="p5/projetWebFinal/essai1.js"></script>
  <script src="p5/projetWebFinal/ObjetClique.js"></script>
  <script src="p5/projetWebFinal/AmeliorationMagasin.js"></script>
</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">A Free Game 4 Farmer</span>
    <span class="site-heading-lower">The Good Sheep</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active px-lg-4">
            <?php

              if(!isset($_SESSION['pseudo'])) {
                ?><a class="nav-link text-uppercase text-expanded" href="index.php?module=jeu">Jeu</a><?php
              } else {
               ?><a class="nav-link text-uppercase text-expanded" href="index.php?module=jeu&id=<?php echo $_SESSION['id_utilisateur']?>&key=<?php echo $_SESSION['clef']?>">Jeu</a><?php
              }
            ?>
            
          </li>
          <li><a class="btn" href="<?php 

            if(isset($_SESSION['pseudo'])) {
              if($_SESSION['estAdmin']==1){
                echo "index.php?module=admin";
              }
              else{
                echo "index.php?module=profil";
              }
            
            } else {
              echo "index.php?module=connexion";
            }?>"><?php 
            if(!isset($_SESSION['pseudo'])) {
              echo "Mon Compte";
            } else {
              echo $_SESSION['pseudo'];
            }
            ?></a>
          </li>

        <!-- <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php?module=connexion">Connexion</a>
          </li>-->


        </ul>
      </div>
    </div>
  </nav>

  <?= $content ?>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; FarmersCo 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="chat.js"></script>
</body>

</html>
