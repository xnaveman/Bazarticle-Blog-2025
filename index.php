<?php 
require_once 'header.php';
sql_connect();
$articlesrecents=sql_select("article", "*",null,null,'numArt DESC','2');

?>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Nos articles →</h1> </br>

<?php 
foreach ($articlesrecents as $key => $article) {
    $thematiques=sql_select("thematique","*","numThem=".$article['numThem']);
    echo '<div class="post-preview">
            <a href="Article.php?numArt='.$article['numArt'].'">
                <h2 class="post-title">'.$thematiques[0]['libThem'].'</h2>
                <h3 class="post-subtitle">'.$article['libTitrArt'].'</h3>
            </a>
        </div>
        <hr class="my-4" />';
}
?>
<div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="Articles.php">Touts nos articles →</a></div>
                </div>
            </div>
        </div>                    



<?php require_once 'footer.php'; ?>