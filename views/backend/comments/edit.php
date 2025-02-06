<?php
include '../../../header.php';

if(isset($_GET['numCom'])){
    $numCom = $_GET['numCom'];
    $tablecom = sql_select("comment", "*", "numCom = $numCom");
    $numMemb=$tablecom[0]['numMemb'];
    $tablemembre = sql_select("membre", "*", "numMemb = $numMemb");
    $tableart=sql_select("article", "*", "numArt = ".$tablecom[0]['numArt']);
}
?>

<!-- Bootstrap form to create a new comment -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification comment</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new comment -->
            <form action="<?php echo ROOT_URL . '/api/comments/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="numArt">Numéro de l'article</label>
                    <input id="numArt" name="numArt" class="form-control" type="text" value="<?php echo($tablecom[0]['numArt']); ?>" readonly="readonly" />
                    <label for="numCom">Numéro du commentaire</label>
                    <input id="numCom" name="numCom" class="form-control" type="text" value="<?php echo($numCom); ?>" readonly="readonly" />
                    <label for="pseudoMemb">Pseudo Membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo($tablemembre[0]['pseudoMemb']); ?>" readonly="readonly" />
                    <label for="libTitrArt">Titre de l'article</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo($tableart[0]['libTitrArt']); ?>" readonly="readonly" />
                    <label for="libAccrochArt">Accroche de l'article</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo($tableart[0]['libAccrochArt']); ?>" readonly="readonly" />
                    <label for="DtCreaCom">Date de création du commentaire</label>
                    <input id="dtCreaCom" name="dtCreaCom" class="form-control" type="text" value="<?php echo($tablecom[0]['dtCreaCom']); ?>" readonly="readonly" />
                    <label for="libCom">Commentaire à valider</label>
                    <input id="libCom" name="libCom" class="form-control" type="text" value="<?php echo($tablecom[0]['libCom']); ?>" />
                    <label for="attModOK"><strong>En tant que modérateur, je valide le commentaire du membre :</strong></label> <br>
                        <input type="radio" id="validoui"name="attModOK" value="0" <?php if ($tablecom[0]['attModOK']==0){echo "checked";}?> />
                        <label for="validoui">Oui</label>
                        <input type="radio" id="validnon" name="attModOK" value="1" <?php if ($tablecom[0]['attModOK']==1){echo "checked";}?> />
                        <label for="validnon">Non</label><br>
                    <label for="notifComKOAff">Si non, en voici les raisons :</label> <br>
                    <textarea id="notifComKOAff" name="notifComKOAff" rows="4" cols="50"><?php echo ($tablecom[0]['notifComKOAff']);?></textarea> <br>
                    <label for="dellogiq"><strong>En tant que modérateur, je souhaite que le post ne soit pas/plus affiché (suppression logique) :</strong></label><br>
                    <input type="radio" id="oui"name="dellogiq" value="1" <?php if ($tablecom[0]['delLogiq']==1){echo "checked";}?>  />
                        <label for="dellogiqoui">Oui</label>
                        <input type="radio" id="dellogiqnon" name="dellogiq" value="0"<?php if ($tablecom[0]['delLogiq']==0){echo "checked";}?>  />
                        <label for="dellogiqnon">Non</label><br> <br>
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

<?php require_once '../../../footer.php'; ?>