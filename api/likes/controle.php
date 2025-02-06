<?php
session_start();
require_once '../../config.php';
require_once '../../functions/query/insert.php';
require_once '../../functions/query/delete.php';

if (!isset($_SESSION['numMemb'])) {
    header('Location: ' . ROOT_URL . '/views/backend/security/login.php');
    exit();
}

$numMemb = $_SESSION['numMemb'];
$numArt = intval($_GET['numArt']);
$action = $_GET['action'];

if ($action == 'like') {
    sql_insert('likeart', 'numMemb, numArt', "$numMemb, $numArt");
} elseif ($action == 'unlike') {
    sql_delete('likeart', "numMemb = $numMemb AND numArt = $numArt");
}

header('Location: ' . ROOT_URL . '/article.php?numArt=' . $numArt);
exit();
?>

