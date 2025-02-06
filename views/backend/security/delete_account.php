<?php
session_start();
require_once '../../../config.php';
require_once '../../../functions/query/delete.php';

if (!isset($_SESSION['numMemb'])) {
    header('Location: ' . ROOT_URL . '/views/backend/security/login.php');
    exit();
}

$numMemb = intval($_POST['numMemb']);

sql_delete('likeart', "numMemb = $numMemb");

sql_delete('comment', "numMemb = $numMemb");

sql_delete('membre', "numMemb = $numMemb");

session_destroy();
header('Location: ' . ROOT_URL . '/index.php');
exit();
?>