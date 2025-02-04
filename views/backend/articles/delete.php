<?php
include '../../../header.php';

if(isset($_GET['numArt'])){
    $numArt = $_GET['numArt'];
    $libTitrArt = sql_select("article", "libTitrArt", "numArt = $numArt")[0]['libTitrArt'];
    $test=sql_select("motclearticle",'*',"numArt=".$numArt);
}
?>

<!-- Bootstrap form to create a new article -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new article -->
            <form action="<?php echo ROOT_URL . '/api/articles/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libTitrArt">Nom de l'article</label>
                    <input id="numArt" name="numArt" class="form-control" style="display: none" type="text" value="<?php echo($numArt); ?>" readonly="readonly" />
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo($libTitrArt); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <?php  if(count($test)!=0) {
                    echo "<div class='fw-bold text-danger'>L'article '$libTitrArt' ne peut pas être supprimé. Car des mots clés y sont associés</div>";
                }?>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger <?php if (count($test)!=0){echo "disabled";} ?>" >Confirmer delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>