<?php 
require_once 'header.php';
sql_connect();

$thematiques = sql_select("thematique", "*");

?>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php 
            foreach ($thematiques as $thematique) {
                $articles = sql_select("article", "*", "numThem=" . $thematique['numThem']);
                if (!empty($articles)) {
                    echo "<h1><u>" . htmlspecialchars($thematique['libThem']) . "</u></h1>";
                    foreach ($articles as $article) {
                        $motclesarticles = sql_select("motclearticle", "*", "numArt=" . $article['numArt']);
                        $motcles = [];
                        foreach ($motclesarticles as $motclesarticle) {
                            $motcle = sql_select("motcle", "*", "numMotcle=" . $motclesarticle['numMotCle'])[0];
                            $motcles[] = $motcle;
                        }
                        echo '<a href="Article.php?numArt=' . $article['numArt'] . '">
                            <h4 class="article-title">' . htmlspecialchars($article['libTitrArt']) . '</h4>
                            <p class="post-subtitle">' . htmlspecialchars($article['libChapoArt']) . '</p>
                        </a>';
                        foreach ($motcles as $motcle) {
                            echo '<span class="badge rounded-pill bg-dark" style="margin-left: 5px; margin-right: 5px;">' . htmlspecialchars($motcle['libMotCle']) . '</span>';
                        }
                        echo '<hr class="my-4" />';
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>