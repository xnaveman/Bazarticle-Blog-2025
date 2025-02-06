<?php 
require_once 'header.php';
sql_connect();

$thematiques=sql_select("thematique","*");
?>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <?php 
                foreach ($thematiques as $key => $thematique) {
                    echo "<h1>".$thematique['libThem']."</h1>";
                    $articles=sql_select("article", "*","numThem=".$thematique['numThem']);
                    foreach ($articles as $key => $article) {
                        echo '<a href="Article.php?numArt='.$article['numArt'].'">
                        <h3 class="article-title">'.$article['libTitrArt'].'</h3>
                        <h4 class="post-subtitle">'.$article['libChapoArt'].'</h4>
                    </a>';
                    echo '<hr class="my-4" />';
                    }
                    echo '<hr>';
                }
                ?>
                


<?php require_once 'footer.php'; ?>