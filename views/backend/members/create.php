<?php
session_start();
include '../../../header.php';
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Membre</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/members/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo du membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="nomMemb">Nom du membre</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="prenomMemb">Prénom du membre</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="passMemb">Mot de passe du membre</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="password" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="passMembVerif">Vérifier le mot de passe</label>
                    <input id="passMembVerif" name="passMembVerif" class="form-control" type="password" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="eMailMemb">Mail du membre</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="eMailMembverif">Verifier le Mail</label>
                    <input id="eMailMembverif" name="eMailMembverif" class="form-control" type="email" autofocus="autofocus" />
                </div>
                <div class="form-group mt-2">
                <?php
                if (!empty($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo "<div class='fw-bold text-danger'>$error</div>";
                    }
                    unset($_SESSION['errors']);
                }
                ?>
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
</div>
<?php include '../../../footer.php'; ?>