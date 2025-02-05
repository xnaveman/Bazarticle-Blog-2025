<?php
include '../../../header.php';
if (check_access(2) == false) {
    header('Location: /index.php');
    exit();
}
if(!isset($_SESSION)){
    session_start();
}?>

<!-- Formulaire de création de membre -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>Créer un nouveau membre</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form data-mdb-theme="light" method="post" action="<?php echo ROOT_URL . '/api/members/create.php' ?>">
                <div class="form-group mb-3">
                    <label for="pseudoMemb">Pseudo du membre</label>
                    <input id="pseudoMemb" name="pseudoMemb" class="form-control" type="text" required autofocus="autofocus" />
                </div>
                <div class="form-group mb-3">
                    <label for="nomMemb">Nom du membre</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" required />
                </div>
                <div class="form-group mb-3">
                    <label for="prenomMemb">Prénom du membre</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" required />
                </div>
                <div class="form-group mb-3">
                    <label for="passMemb">Mot de passe</label>
                    <input id="passMemb" name="passMemb" class="form-control" type="password" required />
                </div>
                <div class="form-group mb-3">
                    <label for="passMembVerif">Vérifier le mot de passe</label>
                    <input id="passMembVerif" name="passMembVerif" class="form-control" type="password" required />
                </div>
                <div class="form-group mb-3">
                    <label for="eMailMemb">Mail du membre</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" required />
                </div>
                <div class="form-group mb-3">
                    <label for="eMailMembverif">Vérifier le mail</label>
                    <input id="eMailMembverif" name="eMailMembverif" class="form-control" type="email" required />
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
                <div class='fw-bold text'>Autoriser la collecte des données (obligatoire)</div>

                <div class="form-group mb-3">
                    <div class="btn-group" role="group" aria-label="rgpd toggle">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="Refuser" autocomplete="off" checked>
                        <label class="btn btn-outline-danger" for="btnradio1">Refuser</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="Accepter" autocomplete="off">
                        <label class="btn btn-outline-success" for="btnradio2">Accepter</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Créer</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnradio1 = document.getElementById('btnradio1');
        const btnradio2 = document.getElementById('btnradio2');
        const submitBtn = document.getElementById('submitBtn');

        function toggleSubmitButton() {
            submitBtn.disabled = !btnradio2.checked;
        }

        btnradio1.addEventListener('change', toggleSubmitButton);
        btnradio2.addEventListener('change', toggleSubmitButton);
    });
</script>

<?php include '../../../footer.php'; ?>