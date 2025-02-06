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
            <form action="<?php echo ROOT_URL . '/api/comments/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="numArt">Numéro de l'article</label>
                    <input id="numArt" name="numArt" class="form-control" type="text" value="<?php echo($tablecom[0]['numArt']); ?>" readonly="readonly" />
                    <label for="numCom">Numéro du commentaire</label>
                    <input id="numCom" name="numCom" class="form-control" type="text" value="<?php echo($numCom); ?>" readonly="readonly" />
                    <label for="pseudoMemb">Pseudo Membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" readonly="readonly" value="<?php echo($tablemembre[0]['pseudoMemb']); ?>" readonly="readonly" />
                    <label for="libTitrArt">Titre de l'article</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text"  readonly="readonly" value="<?php echo($tableart[0]['libTitrArt']); ?>" readonly="readonly" />
                    <label for="libAccrochArt">Accroche de l'article</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" readonly="readonly" value="<?php echo($tableart[0]['libAccrochArt']); ?>" readonly="readonly" />
                    <label for="DtCreaCom">Date de création du commentaire</label>
                    <input id="dtCreaCom" name="dtCreaCom" class="form-control" type="text"readonly="readonly"  value="<?php echo($tablecom[0]['dtCreaCom']); ?>" readonly="readonly" />
                    <label for="libCom">Commentaire à valider</label>
                    <input id="libCom" name="libCom" class="form-control" type="text" readonly="readonly" value="<?php echo($tablecom[0]['libCom']); ?>" />
                    <label for="attModOK"><strong>En tant que modérateur, vous avez validé le post :</strong></label> <br>
                        <input type="radio" id="validoui"name="attModOK" value="0" <?php if ($tablecom[0]['attModOK']==0){echo "checked";}?> disabled/>
                        <label for="validoui">Oui</label>
                        <input type="radio" id="validnon" name="attModOK" value="1" <?php if ($tablecom[0]['attModOK']==1){echo "checked";}?>disabled />
                        <label for="validnon">Non</label><br>
                    <label for="notifComKOAff">Si non, en voici les raisons :</label> <br>
                    <textarea id="notifComKOAff" name="notifComKOAff" rows="4" cols="50" readonly="readonly" ><?php echo ($tablecom[0]['notifComKOAff']);?></textarea> <br>
                    <label for="dellogiq"><strong>En tant que modérateur, vous avez souhaité que le post ne soit pas/plus affiché (supression logique) :</strong></label><br>
                    <input type="radio" id="oui"name="dellogiq" value="1" <?php if ($tablecom[0]['delLogiq']==1){echo "checked";}?> disabled />
                        <label for="dellogiqoui">Oui</label>
                        <input type="radio" id="dellogiqnon" name="dellogiq" value="0"<?php if ($tablecom[0]['delLogiq']==0){echo "checked";}?> disabled />
                        <label for="dellogiqnon">Non</label><br> <br>
                    <label for="libCom">Date suppression logique</label>
                    <input id="libCom" name="libCom" class="form-control" type="text" readonly="readonly" value="<?php echo($tablecom[0]['dtDelLogCom']); ?>" />
                </div>
                <br />
                <div class="form-group mt-2">
                <div class="py-3 fw-bold h5"style="color: var(--bs-danger)"><strong>=> Suppression définitive du commentaire.</strong></div>
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger">Confirmer Delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../../../footer.php'; ?>