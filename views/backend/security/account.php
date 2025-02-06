<?php
include '../../../header.php';
if (!isset($_SESSION)) {
    session_start();
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Paramètres de compte</h1>
            <?php
            if (isset($_SESSION['numMemb'])) {
                $numMemb = $_SESSION['numMemb'];
                $memberData = sql_select("MEMBRE", "*", "numMemb = $numMemb")[0];
                $pseudoMemb = $memberData['pseudoMemb'];
                $prenomMemb = $memberData['prenomMemb'];
                $nomMemb = $memberData['nomMemb'];
                $passMemb = $memberData['passMemb'];
                $passMembVerif = $memberData['passMemb'];
                $eMailMemb = $memberData['eMailMemb'];
                $eMailMembVerif = $memberData['eMailMemb'];
                $numStat = $memberData['numStat'];
                $libStat = sql_select("STATUT", "libStat", "numStat = $numStat")[0]['libStat'];
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/members/update.php' ?>" method="post">
                <!-- Add hidden input for numMemb -->
                <input type="hidden" name="numMemb" value="<?php echo $numMemb; ?>">
                <input type="hidden" name="numStat" value="<?php echo $numStat; ?>">

                <div class="form-group mb-3">
                    <label for="pseudoMemb">Pseudo du Membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" value="<?php echo ($pseudoMemb); ?>" readonly disabled/>
                </div>
                <div class="form-group mb-3">
                    <label for="nomMemb">Nom du membre</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" value="<?php echo ($nomMemb); ?>" required />
                </div>
                <div class="form-group mb-3">
                    <label for="prenomMemb">Prénom du membre</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" value="<?php echo ($prenomMemb); ?>" required />
                </div> </br>
                <div class="form-group mb-3">
                    <label for="eMailMemb">Email du membre</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" value="<?php echo ($eMailMemb); ?>" required />
                </div>
                <div class="form-group mb-3">
                    <label for="eMailMembVerif">Vérification Email du membre</label>
                    <input id="eMailMembVerif" name="eMailMembVerif" class="form-control" type="email" value="<?php echo ($eMailMemb); ?>" required />
                </div> </br>
                <div class="form-group mb-3">
                    <label for="passMemb">Mot de Passe du membre</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="password" value="<?php echo ($passMemb); ?>" required />
                </div>
                <div class="form-group mb-3">
                    <label for="passMembVerif">Vérification Mot de Passe du membre</label>
                    <input id="passMembVerif" name="passMembVerif" class="form-control" type="password" value="<?php echo ($passMemb); ?>" required />
                </div> </br>
                <div class="form-group mb-3">
                    <label for="numStat">Rôle</label>
                    <input id="numStat" name="numStat" class="form-control" type="text" value="<?php echo ($libStat); ?>" readonly disabled/>
                </div>
                <div class="form-group mb-3">
                    <?php
                    if (!empty($_SESSION['errors'])) {
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<div class='fw-bold text-danger'>$error</div>";
                        }
                        unset($_SESSION['errors']);
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php include '../../../footer.php'; ?>