<?php
include '../../../header.php';

if (isset($_GET['numMemb'])) {
    $numMemb = $_GET['numMemb'];
    $memberData = sql_select("MEMBRE", "*", "numMemb = $numMemb")[0];
    $pseudoMemb = $memberData['pseudoMemb'];
    $prenomMemb = $memberData['prenomMemb'];
    $nomMemb = $memberData['nomMemb'];
    $passMemb = $memberData['passMemb'];
    $passMembVerif = $memberData['passMemb'];
    $eMailMemb = $memberData['eMailMemb'];
    $eMailMembVerif = $memberData['eMailMemb'];
}
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Membre</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/members/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="numMemb">Pseudo du Membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo ($pseudoMemb); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                <label for="nomMemb">Nom du membre</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" value="<?php echo ($nomMemb); ?>"/>
                </div>
                <div class="form-group">
                <label for="prenomMemb">Prénom du membre</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" value="<?php echo ($prenomMemb); ?>"/>
                </div>
                <div class="form-group">
                <label for="passMemb">Mot de Passe du membre</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="password" value="<?php echo ($passMemb); ?>"/>
                </div>
                <div class="form-group">
                <label for="passMembVerif">Vérification Mot de Passe du membre</label>
                    <input id="passMembVerif" name="passMembVerif" class="form-control" type="password" value="<?php echo ($passMemb); ?>"/>
                </div>
                <div class="form-group">
                <label for="eMailMemb">Email du membre</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" value="<?php echo ($eMailMemb); ?>"/>
                </div>
                <div class="form-group">
                <label for="eMailMembVerif">Vérification Email du membre</label>
                    <input id="eMailMembVerif" name="eMailMembVerif" class="form-control" type="email" value="<?php echo ($eMailMemb); ?>"/>
                </div>
                <br />
                <?php
                
                if (!empty($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo "<div class='fw-bold text-danger'>$error</div>";
                    }
                    unset($_SESSION['errors']);
                }
                ?>
                <button type="submit" class="btn btn-danger">Confirmer update ?</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>