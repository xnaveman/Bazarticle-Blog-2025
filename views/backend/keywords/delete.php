<?php
include '../../../header.php';
require_once '../../../functions/ctrlSaisies.php';
require_once '../../../functions/query/select.php';
if (check_access(2) == false) {
    header('Location: /index.php');
    exit();
}

if (isset($_GET['numMotCle'])) {
    $numMotCle = intval(ctrlSaisies($_GET['numMotCle']));
    $result = sql_select("MOTCLE", "libMotCle", "numMotCle = $numMotCle");
    $test = sql_select("MOTCLEARTICLE",'*',"numMotCle=".$numMotCle);


        $libMotCle = $result[0]['libMotCle'];
}
?>

<!-- Bootstrap form to delete a keyword -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Mot clé</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to delete a keyword -->
            <form action="<?php echo ROOT_URL . '/api/keywords/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libMotCle">Nom du mot clé</label>
                    <input id="numMotCle" name="numMotCle" class="form-control" style="display: none" type="text" value="<?php echo($numMotCle); ?>" readonly="readonly" />
                    <input id="libMotCle" name="libMotCle" class="form-control" type="text" value="<?php echo($libMotCle); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <?php  if(count($test)!=0) {
                    echo "<div class='fw-bold text-danger'>Le mot clé '$libMotCle' est attribué à des articles, il ne peut pas être supprimé.</div>";
                }?>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger"<?php if (count($test)!=0){echo "disabled";} ?>>Confirmer delete ?</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>