<?php
include '../../../header.php';
if (check_access(1) == false) {
    echo "Vous n'avez pas les droits pour accéder à cette page."; 
    exit();
}

if(isset($_GET['numStat'])){
    $numStat = $_GET['numStat'];
    $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];
    $test=sql_select("membre",'*',"numStat=".$numStat);
}
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Statut</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/statuts/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    <input id="numStat" name="numStat" class="form-control" style="display: none" type="text" value="<?php echo($numStat); ?>" readonly="readonly" />
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo($libStat); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <?php  if(count($test)!=0) {
                    echo "<div class='fw-bold text-danger'>Le statut '$libStat' est attribué à des utilisateurs, il ne peut pas être supprimé.</div>";
                }?>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger <?php if (count($test)!=0){echo "disabled";} ?>" >Confirmer delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>