<?php
include '../../../header.php';
$numMemb=$_SESSION['numMemb'];
$tablemembre=sql_select("membre","*","numMemb=$numMemb")[0];
$articles=sql_select("article","*");
?>

<!-- Bootstrap form to create a new Commentaire -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Commentaire</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new Commentaire -->
            <form action="<?php echo ROOT_URL . '/api/comments/create.php' ?>" method="post">
                <div class="form-group">
                <input id="numMemb" name="numMemb" class="form-control" style="display: none;" value="<?php echo $numMemb ?>"readonly="readonly" type="text" autofocus="autofocus" />
                    <label for="libCom">Pseudo</label>
                    <input id="libCom" name="libCom" class="form-control" value="<?php echo $tablemembre['pseudoMemb'] ?>"readonly="readonly" type="text" autofocus="autofocus" />
                    <label for="libCom">Prénom</label>
                    <input id="libCom" name="libCom" class="form-control" value="<?php echo $tablemembre['prenomMemb'] ?>"readonly="readonly" type="text" autofocus="autofocus" />
                    <label for="libCom">Nom</label>
                    <input id="libCom" name="libCom" class="form-control" value="<?php echo $tablemembre['nomMemb'] ?>"readonly="readonly" type="text" autofocus="autofocus" />
                    <label class = "h5"for="numArt">Liste des articles</label> <br>
                    <select id = "numArt" name= "numArt">
                        <?php 
                        foreach ($articles as $article) {
                            echo "<option value='".$article['numArt']."'> ".$article['libTitrArt']."</option>";
                        }
                        ?>
                    </select> <br>
                    <label for="libCom">Commentaire</label>
                    <input id="libCom" name="libCom" class="form-control" type="text" autofocus="autofocus" />
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

<?php require_once '../../../footer.php'; ?>