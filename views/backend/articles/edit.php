<?php
include '../../../header.php';

if(isset($_GET['numArt'])){
    $numArt = $_GET['numArt'];
    $libTitrArt = sql_select("article", "libTitrArt", "numArt = $numArt")[0]['libTitrArt'];
    $libChapoArt = sql_select("article", "libChapoArt", "numArt = $numArt")[0]['libChapoArt'];
    $libAccrochArt = sql_select("article", "libAccrochArt", "numArt = $numArt")[0]['libAccrochArt'];
    $parag1Art = sql_select("article", "parag1Art", "numArt = $numArt")[0]['parag1Art'];
    $libSsTitr1Art = sql_select("article", "libSsTitr1Art", "numArt = $numArt")[0]['libSsTitr1Art'];
    $parag2Art = sql_select("article", "parag2Art", "numArt = $numArt")[0]['parag2Art'];
    $libSsTitr2Art = sql_select("article", "libSsTitr2Art", "numArt = $numArt")[0]['libSsTitr2Art'];
    $parag3Art = sql_select("article", "parag3Art", "numArt = $numArt")[0]['parag3Art'];
    $libConclArt = sql_select("article", "libConclArt", "numArt = $numArt")[0]['libConclArt'];
    $libSsTitr2Art = sql_select("article", "libSsTitr2Art", "numArt = $numArt")[0]['libSsTitr2Art'];
    $urlPhotArt = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
    
}
$thematiques = sql_select("THEMATIQUE", "*");
$motcles = sql_select("motcle", "*");
$motsclesarticle=sql_select("motclearticle","numMotCle", "numArt=$numArt");
var_dump($motsclesarticle);
$articles = sql_select("article", "*");
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification Article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/articles/update.php?numArt='.$numArt ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                <label for="libTitrArt">Titre de l'article</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" maxlenght="100" value="<?php echo($libTitrArt); ?>"type="text"  />
                    <label for="libChapoArt">Chapô de l'article</label>
                    <input id="libChapoArt" name="libChapoArt" class="form-control" value="<?php echo($libChapoArt); ?>" type="text"  />
                    <label for="libAccrochArt">Accroche de l'article</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control"  maxlenght="100"value="<?php echo($libAccrochArt); ?>"type="text"  />
                    <label for="parag1Art">Paragraphe 1 de l'article</label>
                    <input id="parag1Art" name="parag1Art" class="form-control" type="text"value="<?php echo($parag1Art); ?>"  />
                    <label for="libSsTitr1Art">Sous Titre 1 de l'article</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" maxlenght="100"type="text" value="<?php echo($libSsTitr1Art); ?>" />
                    <label for="parag2Art">Paragraphe 2 de l'article</label>
                    <input id="parag2Art" name="parag2Art" class="form-control" type="text"value="<?php echo($parag2Art); ?>"  />
                    <label for="libSsTitr2Art">Sous Titre 2 de l'article</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" maxlenght="100"type="text" value="<?php echo($libSsTitr2Art); ?>" />
                    <label for="parag3Art">Paragraphe 3 de l'article</label>
                    <input id="parag3Art" name="parag3Art" class="form-control" type="text"value="<?php echo($parag3Art); ?>"  />
                    <label for="libConclArt">Conclusion de l'article</label>
                    <input id="libConclArt" name="libConclArt" class="form-control" type="text"value="<?php echo($libConclArt); ?>"  />
                    <label for="urlPhotArt">Illustration de l'article</label>
                    <input id="urlPhotArt" name="urlPhotArt" class="form-control" type="file" accept="image/png, image/jpeg, image/gif, image/jpg" />
                    <img src="<?php echo $urlPhotArt ?>">
                    <label for="numThem">Thématique de l'article</label>
                    <select id = "numThem" name= "numThem">
                    <option value="" >--Choisir une thématique--</option>
                        <?php 
                        foreach ($thematiques as $thematique) {
                            echo "<option value='".$thematique['numThem']."'> ".$thematique['libThem']."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="libTitrArt">Choissisez les mots clés de l'article</label> <br>
                    <?php 
                    $i=0;
                    foreach($motcles as $motcle){
                        if ($motcle['numMotCle']==$motsclesarticle[$i]['numMotCle']){
                            echo "<input type='checkbox' checked name = '".$motcle['numMotCle']."'id='".$motcle['numMotCle']."'> ";
                            $i=$i+1;
                        } else {
                            echo "<input type='checkbox' name = '".$motcle['numMotCle']."'id='".$motcle['numMotCle']."'> ";
                        }
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
            </form>
        </div>
    </div>
</div>