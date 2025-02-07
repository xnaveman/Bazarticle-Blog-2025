<?php
include '../../../header.php';

if(isset($_GET['numArt'])){
    $numArt = intval($_GET['numArt']);
    $article = sql_select("article", "*", "numArt = $numArt")[0];

    if ($article) {
        $libTitrArt = $article['libTitrArt'];
        $libChapoArt = $article['libChapoArt'];
        $libAccrochArt = $article['libAccrochArt'];
        $parag1Art = $article['parag1Art'];
        $libSsTitr1Art = $article['libSsTitr1Art'];
        $parag2Art = $article['parag2Art'];
        $libSsTitr2Art = $article['libSsTitr2Art'];
        $parag3Art = $article['parag3Art'];
        $libConclArt = $article['libConclArt'];
        $urlPhotArt = $article['urlPhotArt'];
    } else {
        die('Article non trouvé.');
    }
} else {
    die('Numéro d\'article non spécifié.');
}

$thematiques = sql_select("THEMATIQUE", "*");
$motcles = sql_select("motcle", "*");
$motsclesarticle = sql_select("motclearticle", "numMotCle", "numArt = $numArt");
?>

<!-- Bootstrap form to edit an article -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification Article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to edit an article -->
            <form action="<?php echo ROOT_URL . '/api/articles/update.php' ?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="numArt" value="<?php echo $numArt; ?>">
                <div class="form-group">
                    <label for="libTitrArt">Titre de l'article</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo htmlspecialchars($libTitrArt); ?>" required />
                    <label for="libChapoArt">Chapô de l'article</label>
                    <input id="libChapoArt" name="libChapoArt" class="form-control" type="text" value="<?php echo htmlspecialchars($libChapoArt); ?>" required />
                    <label for="libAccrochArt">Accroche de l'article</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo htmlspecialchars($libAccrochArt); ?>" required />
                    <label for="parag1Art">Paragraphe 1 de l'article</label>
                    <input id="parag1Art" name="parag1Art" class="form-control" type="text" value="<?php echo htmlspecialchars($parag1Art); ?>" required />
                    <label for="libSsTitr1Art">Sous Titre 1 de l'article</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" value="<?php echo htmlspecialchars($libSsTitr1Art); ?>" required />
                    <label for="parag2Art">Paragraphe 2 de l'article</label>
                    <input id="parag2Art" name="parag2Art" class="form-control" type="text" value="<?php echo htmlspecialchars($parag2Art); ?>" required />
                    <label for="libSsTitr2Art">Sous Titre 2 de l'article</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" value="<?php echo htmlspecialchars($libSsTitr2Art); ?>" required />
                    <label for="parag3Art">Paragraphe 3 de l'article</label>
                    <input id="parag3Art" name="parag3Art" class="form-control" type="text" value="<?php echo htmlspecialchars($parag3Art); ?>" required />
                    <label for="libConclArt">Conclusion de l'article</label>
                    <input id="libConclArt" name="libConclArt" class="form-control" type="text" value="<?php echo htmlspecialchars($libConclArt); ?>" required />
                    <label for="urlPhotArt">Illustration de l'article</label>
                    <input id="urlPhotArt" name="urlPhotArt" class="form-control" type="file" accept="image/png, image/jpeg, image/gif, image/jpg" />
                    <label for="numThem">Thématique de l'article</label>
                    <select id="numThem" name="numThem" class="form-control" required>
                        <option value="">--Choisir une thématique--</option>
                        <?php 
                        foreach ($thematiques as $thematique) {
                            echo "<option value='".$thematique['numThem']."' ".($thematique['numThem'] == $article['numThem'] ? 'selected' : '')."> ".$thematique['libThem']."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="libTitrArt">Choisissez les mots clés de l'article</label> <br>
                    <?php 
                    $selectedMotcles = array_column($motsclesarticle, 'numMotCle');
                    foreach($motcles as $motcle){
                        $checked = in_array($motcle['numMotCle'], $selectedMotcles) ? 'checked' : '';
                        echo "<input type='checkbox' name='motcles[]' value='".$motcle['numMotCle']."' id='".$motcle['numMotCle']."' $checked> ";
                        echo $motcle['libMotCle']."<br>";
                    }
                    ?>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../../footer.php'; ?>