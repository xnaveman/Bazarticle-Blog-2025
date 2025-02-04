<?php
include '../../../header.php';

if (isset($_GET['numMemb'])) {
    $numMemb = $_GET['numMemb'];
    $pseudoMemb = sql_select("MEMBRE", "pseudoMemb", "numMemb = $numMemb")[0]['pseudoMemb'];
    $test1 = sql_select("COMMENT", '*', "numMemb=" . $numMemb);
    $test2 = sql_select("LIKEART", '*', "numMemb=" . $numMemb);
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
            <form action="<?php echo ROOT_URL . '/api/members/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="numMemb">Pseudo du Membre</label>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo ($numMemb); ?>" readonly="readonly" />
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo ($pseudoMemb); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <?php if (count($test1) != 0 || count($test2) != 0) {
                        echo "<div class='fw-bold text-danger'>Le membre '$pseudoMemb' à un ou plusieurs commentaires créés et/ou des likes actifs sur des articles, il ne peut pas être supprimé !</div>";
                    } ?>
                    <div class="form-group mt-2">
                        <a href="list.php" class="btn btn-primary">List</a>
                        <button type="submit" class="btn btn-danger <?php if (count($test1) != 0 || count($test2) != 0) {
                                                                        echo "disabled";
                                                                    } ?>">Confirmer delete ?</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>