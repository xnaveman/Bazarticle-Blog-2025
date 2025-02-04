<?php
include '../../../header.php';
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container">
    <div class="row">
        <div class="col md-12">
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
            }
            ?>
        </div>
    </div>
</div>