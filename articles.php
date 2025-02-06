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
                    echo "<h1><u>".$thematique['libThem']."</u></h1>";
                    $articles=sql_select("article", "*","numThem=".$thematique['numThem']);
                    foreach ($articles as $key => $article) {
                        echo '<a href="Article.php?numArt='.$article['numArt'].'">
                        <h4 class="article-title">'.$article['libTitrArt'].'</h4>
                        <p class="post-subtitle">'.$article['libChapoArt'].'</p>
                    </a>';
                    echo '<hr class="my-4" />';
                    }
                }
                ?>
                


<?php require_once 'footer.php'; ?>