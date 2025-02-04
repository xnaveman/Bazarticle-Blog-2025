<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/select.php';
require_once '../../functions/query/insert.php';

session_start();

$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$passMembVerif = ctrlSaisies($_POST['passMembVerif']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$eMailMembverif = ctrlSaisies($_POST['eMailMembverif']);
$dtCreaMemb = date("Y-m-d-H-i-s");
$errors = [];

$nbrchara = strlen($pseudoMemb);
$existingPseudo = sql_select("MEMBRE", "pseudoMemb", "pseudoMemb = '$pseudoMemb'");

$passRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/';

    if ($nbrchara < 6 || $nbrchara > 70) {
        $errors[] = "Le pseudo doit contenir entre 6 et 70 caractères !";
    } elseif (!empty($existingPseudo)) {
        $errors[] = "Le pseudo existe déjà !";
    } elseif (empty($pseudoMemb) || empty($nomMemb) || empty($prenomMemb) || empty($passMemb) || empty($eMailMemb)) {
        $errors[] = "Toutes les cases du formulaire doivent être remplies !";
    } elseif ($eMailMembverif != $eMailMemb) {
        $errors[] = "Les mails ne sont pas identiques";
    } elseif ($passMembVerif != $passMemb) {
        $errors[] = "Les mots de passe ne sont pas identiques";
    } elseif (!preg_match($passRegex, $passMemb)) {
        $errors[] = "Le mot de passe doit contenir entre 8 et 15 caractères, avec au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
    }

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../../views/backend/security/signup.php');
    exit();
} else {
    // $hashedPassMemb = password_hash($passMemb, PASSWORD_DEFAULT);
    $_SESSION['signup-success'] = true;
    sql_insert('MEMBRE', 'pseudoMemb, nomMemb, prenomMemb, passMemb, eMailMemb, numStat, dtCreaMemb', "'$pseudoMemb', '$nomMemb', '$prenomMemb', '$passMemb', '$eMailMemb', '3', '$dtCreaMemb'");
    header('Location: ../../views/backend/security/signup.php');
    exit();
}
?>