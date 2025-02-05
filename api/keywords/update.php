<?php
session_start(); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numMotCle = ctrlSaisies($_POST['numMotCle']);
$libMotCle = ctrlSaisies($_POST['libMotCle']);
$errors = [];
if (empty($numMotCle) || empty($libMotCle)) {
    $errors[] = "Toutes les cases du formulaire doivent être remplies !";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: ../../views/backend/keywords/edit.php?numMotCle=' . $numMotCle); 
    exit();
} else {
    sql_update('MOTCLE', "libMotCle = '$libMotCle'", "numMotCle = '$numMotCle'");
    header('Location: ../../views/backend/keywords/list.php');
    exit();
}