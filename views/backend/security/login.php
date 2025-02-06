<?php
include '../../../header.php';

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>Login</h1>
            <?php if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<div class="fw-bold text-danger">' . 'Identifiants incorrects' . '</div>';
            } ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form data-mdb-theme="light" method="post" action="<?php echo ROOT_URL . '/api/security/login.php' ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="loginCheck">
                    <label class="form-check-label" for="loginCheck">Se souvenir de moi</label>
                </div>
                <a href="index.php">
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </a>
            </form> </br>
        </div>
    </div>
</div>

<?php require_once '../../../footer.php'; ?>