<?php
include '../../../header.php';

?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Signup</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form data-mdb-theme="light" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>

