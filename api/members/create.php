<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);

sql_insert('MEMBRE', 'pseudoMemb, nomMemb, prenomMemb, passMemb, eMailMemb, numStat', "'$pseudoMemb', '$nomMemb', '$prenomMemb', '$passMemb', '$eMailMemb', '3' ");


header('Location: ../../views/backend/members/list.php');