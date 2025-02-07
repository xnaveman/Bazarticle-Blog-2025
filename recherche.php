<?php
include("header.php");
require_once 'functions/query/select.php';

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos(strtolower($haystack), strtolower($needle)) !== false;
    }
}

$search_result = array();
$articles = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $typerecherche = isset($_POST["typerecherche"]) ? trim($_POST["typerecherche"]) : '';
    $recherche = isset($_POST["recherche"]) ? trim($_POST["recherche"]) : '';

    if ($typerecherche === "motcle") {
        $motclerechreche = sql_select("motcle", "*", 'libMotCle LIKE "%' . $recherche . '%"');
        foreach ($motclerechreche as $motclere) {
            $motclearticle = sql_select("motclearticle", "*", "numMotCle=" . $motclere["numMotCle"]);
            foreach ($motclearticle as $motclee) {
                $article = sql_select("article", "*", "numArt=" . $motclee['numArt']);
                if (!empty($article)) {
                    $articles[] = $article[0];
                }
            }
        }
    } elseif ($typerecherche === "thematique") {
        $thematiquerecherche = sql_select("thematique", "*", 'libThem LIKE "%' . $recherche . '%"');
        if (!empty($thematiquerecherche)) {
            $articles = sql_select("article", "*", "numThem=" . $thematiquerecherche[0]['numThem']);
        }
    } elseif ($typerecherche === "article") {
        $articles = sql_select("article", "*", 'libTitrArt LIKE "%' . $recherche . '%"');
    }
}
?>

<div class="container">
    <h1>Rechercher</h1>
    <form method="post" action="recherche.php">
        <div class="form-group">
            <label for="typerecherche">Type de recherche</label>
            <select id="typerecherche" name="typerecherche" class="form-control" required>
                <option value="">--Choisir un type de recherche--</option>
                <option value="motcle">Mot Clé</option>
                <option value="thematique">Thématique</option>
                <option value="article">Article</option>
            </select>
        </div>
        <div class="form-group">
            <label for="recherche">Recherche</label>
            <input id="recherche" name="recherche" class="form-control" type="text" required />
        </div>
        <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
    </form>

    <?php if (!empty($articles)): ?>
        <h2>Résultats de la recherche</h2>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <a href="Article.php?numArt=<?php echo $article['numArt']; ?>">
                        <?php echo htmlspecialchars($article['libTitrArt']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?php include("footer.php"); ?>