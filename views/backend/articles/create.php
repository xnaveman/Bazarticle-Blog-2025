<?php
include '../../../header.php';
?>
<?php
$thematiques = sql_select("THEMATIQUE", "*");
$motcles = sql_select("motcle", "*");

?>
<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/articles/create.php' ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="libTitrArt">Titre de l'article</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text"  />
                    <label for="libChapoArt">Chapô de l'article</label>
                    <input id="libChapoArt" name="libChapoArt" class="form-control" type="text"  />
                    <label for="libAccrochArt">Accroche de l'article</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text"  />
                    <label for="parag1Art">Paragraphe 1 de l'article</label>
                    <input id="parag1Art" name="parag1Art" class="form-control" type="text"  />
                    <label for="libSsTitr1Art">Sous Titre 1 de l'article</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text"  />
                    <label for="parag2Art">Paragraphe 2 de l'article</label>
                    <input id="parag2Art" name="parag2Art" class="form-control" type="text"  />
                    <label for="libSsTitr2Art">Sous Titre 2 de l'article</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text"  />
                    <label for="parag3Art">Paragraphe 3 de l'article</label>
                    <input id="parag3Art" name="parag3Art" class="form-control" type="text"  />
                    <label for="libConclArt">Conclusion de l'article</label>
                    <input id="libConclArt" name="libConclArt" class="form-control" type="text"  />
                    <label for="urlPhotArt">Illustration de l'article</label>
                    <input id="urlPhotArt" name="urlPhotArt" class="form-control" type="file" accept="image/png, image/jpeg, image/gif, image/jpg" />
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
                    foreach($motcles as $motcle){
                        echo "<input type='checkbox' name = '".$motcle['numMotCle']."'id='".$motcle['numMotCle']."'> ";
                        echo $motcle['libMotCle']."<br>";
                       
                    }
                    ?>
                    
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>