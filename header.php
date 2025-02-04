<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <?php
  session_start();
  ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog'Art</title>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Load CSS -->
  <link rel="stylesheet" href="src/css/style.css" />
  <!-- Bootstrap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="shortcut icon" type="image/x-icon" href="src/images/article.png" />
</head>
<?php
//load config
require_once 'config.php';
?>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blog'Art 25</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/views/backend/dashboard.php">Admin</a>
          </li>
        </ul>
      </div>
      <!--right align-->
      <div class="d-flex">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Rechercher sur le site…" aria-label="Search">
        </form>
        <?php
        if (isset($_SESSION['pseudoMemb'])) {
          echo '<button type="button" class="btn btn-outline-secondary">' . $_SESSION['pseudoMemb'] . '</button>';
          echo '<a class="btn btn-primary m-1" href="/api/security/disconnect.php" role="button">Déconnexion</a>';
        } else {
          echo '<a class="btn btn-primary m-1" href="/views/backend/security/login.php" role="button">Login</a>';
          echo '<a class="btn btn-dark m-1" href="/views/backend/security/signup.php" role="button">Inscription</a>';
        }
        ?>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
          });
        </script>



        <?php
        if (isset($_GET['cookie']) && $_GET['cookie'] == 1) {
          setcookie("cookie", "true", time() + 365 * 24 * 60 * 60, "/");
        } else if (isset($_GET['cookie'])) {
          setcookie("cookie", "false", time() + 365 * 24 * 60 * 60, "/");
        } else {
          if (!isset($_COOKIE['cookie'])) {
            echo '
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Accepter nos cookies</h1>
      </div>
      <div class="modal-body">
        Ce site utilise des cookies pour optimiser votre expérience et améliorer nos services. En acceptant, vous profitez d’un site plus fluide, personnalisé et performant.
      </div>
      <div class="modal-footer">';
            echo '<a class="btn btn-primary m-1" href="index.php?cookie=0" role="button">Refuser les cookies</a>';
            echo '<a class="btn btn-primary m-1" href="index.php?cookie=1" role="button">Accepter les cookies</a>';
            echo ' </div>
    </div>
  </div>
</div>';
          }
        }

        ?>
      </div>
    </div>
  </nav>