<?php
include '../../../header.php';

if(isset($_GET['numThem'])){
    $numThem = $_GET['numThem'];
    $libThem = sql_select("THEMATIQUE", "libThem", "numThem = $numThem")[0]['libThem'];
    $test=sql_select("article",'*',"numThem=".$numThem);
}
?>

<!-- Bootstrap form to delete a thematique -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Thematique</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to delete a thematique -->
            <form action="<?php echo ROOT_URL . '/api/thematiques/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libThem">Nom de la thematique</label>
                    <input id="numThem" name="numThem" class="form-control" style="display: none" type="text" value="<?php echo($numThem); ?>" readonly="readonly" />
                    <input id="libThem" name="libThem" class="form-control" type="text" value="<?php echo($libThem); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <?php  if(count($test)!=0) {
                    echo "<div class='fw-bold text-danger'>La thématique '$libThem' est attribué à des articles, elle ne peut pas être supprimée.</div>";
                }?>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger"<?php if (count($test)!=0){echo "disabled";} ?>>Confirmer delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>