<!DOCTYPE html>
<html lang="fr-FR">
<?php
ob_start();
require_once 'config.php';
?>

<head>
  <?php
  session_start();
  ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bordeaux : Le monde à travers Bordeaux</title>
  <link rel="icon" type="image/x-icon" href="<?php echo ROOT_URL; ?>/src/images/favicon.ico" />
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/src/css/style.css">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo ROOT_URL; ?>/src/images/article.png" />
</head>

<body>
  <header <?php if (!isset($_GET['numArt'])){echo 'class="masthead" style="background-image: url('.ROOT_URL.'/src/images/juan-di-nella-ulhxvMjzI_4-unsplash.jpg);"';}?>>

    <script>
    function showCookieBanner() {
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "block";
}

function hideCookieBanner() {
    localStorage.setItem("cb_isCookieAccepted", "yes");
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "none";
}

function initializeCookieBanner() {
    let isCookieAccepted = localStorage.getItem("cb_isCookieAccepted")
    if (isCookieAccepted == "yes") {
        hideCookieBanner();
    }
    if (isCookieAccepted =="no"){
      showCookieBanner();
    }
}


window.onload = initializeCookieBanner;
window.cb_hideCookieBanner = hideCookieBanner;

</script>
<style>
#cb-cookie-banner {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgb(208, 208, 208);
    color: black;
    padding: 15px;
    text-align: center;
    z-index: 9999;
}
</style>
<!-- Cookie Banner -->
<div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
  &#x1F36A; Ce site utilise des cookies afin de vous permettre la meilleure experience.
  <a href="https://www.cookiesandyou.com/" target="blank">En savoir plus</a>
  <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
    Ok merci !
  </button>
</div>
<!-- End of Cookie Banner -->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container px-4 px-lg-5">
        <img class="logo" src="<?php echo ROOT_URL; ?>/src/images/vector.png" class="img-fluid" alt="Responsive image">
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>/index.php">Baz'Article<Article></Article></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto py-4 py-lg-0">

            <?php if (isset($_SESSION['numStat']) && ($_SESSION['numStat'] == 1 || $_SESSION['numStat'] == 2)) {
              echo "<li class='nav-item'>
            <a class='nav-link px-lg-3 py-3 py-lg-4' href='" . ROOT_URL . "/views/backend/dashboard.php'>ADMIN</a>
          </li>";
            } ?>

            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo ROOT_URL?>/index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo ROOT_URL?>/recherche.php">Rechercher</a></li>
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo ROOT_URL?>/articles.php">Articles</a></li>
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo ROOT_URL?>/index.php">Contact</a></li>

            <?php if (isset($_SESSION['pseudoMemb'])) {
              echo "<li class='nav-item'><a href='" . ROOT_URL . "/views/backend/security/account.php'><button type='button' class='btn btn-outline-light button'>" . $_SESSION['pseudoMemb'] . "</button></a></li>";
              echo "<li class='nav-item'><a href='" . ROOT_URL . "/api/security/disconnect.php'><button type='button' class='btn btn-light button'> DÉCONNEXION</button></a></li>";
            } else {
              echo "<li class='nav-item'><a href='" . ROOT_URL . "/views/backend/security/signup.php'><button type='button' class='btn btn-light button'>S'INSCRIRE</button></a></li>";
              echo "<li class='nav-item'><a href='" . ROOT_URL . "/views/backend/security/login.php'><button type='button' class='btn btn-outline-light button'> SE CONNECTER</button></a></li>";
            } ?>

          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header-->
     <?php if (!isset($_GET['numArt'])){ echo '<div class="container position-relative px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div class="site-heading">
            <h1>Bordeaux</h1>
            <span class="subheading">Le Monde à travers Bordeaux</span>
          </div>
        </div>
      </div>
    </div>';}?>
    
  </header>