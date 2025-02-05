<?php
include '../../../header.php';
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
                    <label for="libCom">Pseudo</label>
                    <input id="libCom" name="libCom" class="form-control" readonly="readonly" type="text" autofocus="autofocus" />
                    <label for="libCom">Prénom</label>
                    <input id="libCom" name="libCom" class="form-control" readonly="readonly" type="text" autofocus="autofocus" />
                    <label for="libCom">Nom</label>
                    <input id="libCom" name="libCom" class="form-control" readonly="readonly" type="text" autofocus="autofocus" />
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