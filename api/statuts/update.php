<?php
session_start(); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numStat = ctrlSaisies($_POST['numStat']);
$libStat = ctrlSaisies($_POST['libStat']);
$errors = [];
if (empty($numStat) || empty($libStat)) {
    $errors[] = "Toutes les cases du formulaire doivent être remplies !";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../../views/backend/statuts/edit.php?numStat=' . $numStat); 
    exit();
} else {
    sql_update('STATUT', "libStat = '$libStat'", "numStat = $numStat");
    header('Location: ../../views/backend/statuts/list.php');
    exit();
}