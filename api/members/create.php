<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/select.php';
require_once '../../functions/query/insert.php';

$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$eMailMembverif = ctrlSaisies($_POST['eMailMembverif']);
$dtCreaMemb = date("Y-m-d-H-i-s");
$errors = [];

$nbrchara = strlen($pseudoMemb);
$existingPseudo = sql_select("MEMBRE", "pseudoMemb", "pseudoMemb = '$pseudoMemb'");

if ($nbrchara < 6 || $nbrchara > 70) {
    $errors[] = "Le pseudo doit contenir entre 6 et 70 caractères !";
} elseif (!empty($existingPseudo)) {
    $errors[] = "Le pseudo existe déjà !";
} elseif (empty($pseudoMemb) || empty($nomMemb) || empty($prenomMemb) || empty($passMemb) || empty($eMailMemb)) {
    $errors[] = "Toutes les cases du formulaire doivent être remplies !";
} elseif($eMailMembverif != $eMailMemb) {
    $errors[] = "Les mails ne sont pas identiques";
}


if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../../views/backend/members/create.php');
    exit();
} else {
    sql_insert('MEMBRE', 'pseudoMemb, nomMemb, prenomMemb, passMemb, eMailMemb, numStat, dtCreaMemb', "'$pseudoMemb', '$nomMemb', '$prenomMemb', '$passMemb', '$eMailMemb', '3', '$dtCreaMemb'");
    header('Location: ../../views/backend/members/list.php');
    exit();
}