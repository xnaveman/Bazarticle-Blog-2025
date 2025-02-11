<?php
include 'header.php';
require_once 'functions/query/select.php';

$numArt = $_GET['numArt'];
$article = sql_select("ARTICLE", "*", "numArt = $numArt")[0];
$likeCount = sql_select("likeart", "COUNT(*) as count", "numArt = $numArt")[0]['count'];
$numThem = sql_select("article", "*", "numThem=" . $article['numThem'])[0]['numThem'];
$libThem = sql_select("thematique", "libThem", "numThem=" . $numThem)[0]['libThem'];



if (isset($_SESSION['numMemb'])) {
    $numMemb = $_SESSION['numMemb'];
    $hasLiked = has_liked($numMemb, $numArt);
}
?>

<header class="masthead" style="background-image: url('/src/uploads/<?php echo $article['urlPhotArt']; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <div class="post-heading">
                        <h1> <?php echo $libThem; ?> <br> <?php echo $article['libTitrArt']; ?></h1>
                        <h2 class="subheading"><?php echo $article['libAccrochArt']; ?></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php echo "<p>" . $article['libChapoArt'] . "</p>"; ?>
            <?php echo "<p>" . $article['parag1Art'] . "</p>"; ?>
            <?php echo "<h4>" . $article['libSsTitr1Art'] . "</h4>"; ?>
            <?php echo "<p>" . $article['parag2Art'] . "</p>"; ?>
            <?php echo "<h4>" . $article['libSsTitr2Art'] . "</h4>"; ?>
            <?php echo "<p>" . $article['parag3Art'] . "</p>"; ?>
            <?php echo "<p>" . $article['libConclArt'] . "</p>"; ?> </br>
        </div>
    </div>
</div> </br>
<a id="like"></a>
<?php
if (isset($_SESSION['pseudoMemb'])) {
    echo "<div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='mb-3'>";
    if ($hasLiked) {
        echo "<a href='" . ROOT_URL . "/api/likes/controle.php?action=unlike&numArt=$numArt'> 
                    <button class='btn btn-outline-danger' type='button'>
                        Je n'aime plus cet article
                    </button> 
                    </a> 
                    <i class='fa fa-thumbs-up'></i> " . $likeCount;
    } else {
        echo "<a href='" . ROOT_URL . "/api/likes/controle.php?action=like&numArt=$numArt'> 
                    <button class='btn btn-outline-success' type='button'>
                        J'aime cet article
                    </button> 
                    </a> 
                    <i class='fa fa-thumbs-up'></i> " . $likeCount;
    }
    $comments = sql_select("comment", "*", "numArt=" . $_GET['numArt']);
    foreach ($comments as $key => $comment) {
        $membres = sql_select("membre", "*", "numMemb=" . $comment['numMemb'])[0];
        if ($comment['attModOK'] == "1" && $comment['delLogiq'] == "0") {
            echo    '
                    <h3>Commentaires</h3>
                    <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex flex-start">
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-primary fw-bold mb-0">
                    ' . $membres["pseudoMemb"] . '
                    <span class="text-body ms-2">' . $comment["libCom"] . '</span>
                  </h6>
                </div>
                  </div>
                </div>
              </div>
              </div>';
        }
    }
    echo "</div>
                <div class='comment'>
                    <h3>Ajouter un commentaire</h3>
                    <form action='/api/comments/create.php?numArt=" . $_GET['numArt'] . "' method='post'>
                    <div class='mb-3'>
                        <label for='exampleFormControlInput1' class='form-label'>" . htmlspecialchars($_SESSION['pseudoMemb']) . "</label>
                    </div>
                    <div class='mb-3'>
                    <input id='numMemb' name='numMemb' class='form-control' style='display: none;' value='" . $_SESSION['numMemb'] . "'readonly='readonly' type='text' autofocus='autofocus' />
                    <input id='numArt' name='numArt' class='form-control' style='display: none;' value='" . $_GET['numArt'] . "'readonly='readonly' type='text' autofocus='autofocus' />
                        <label for='exampleFormControlTextarea1' class='form-label'>Zone de texte</label>
                        <textarea name='libCom' class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                        <button type='submit' class='btn btn-dark button-comment'>
                        ENVOYER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>";
} else {
    echo "<div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>";
    echo "<div class='fw-bold text-danger'>Vous devez vous connecter pour liker ou commenter les articles.</div>";
    echo "</div>
        </div>
    </div>";
}
?>

<?php include 'footer.php'; ?>