<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
$numMemb=$_POST['numMemb'];
var_dump($numMemb);
$numArt=$_POST['numArt'];
$libCom = ctrlSaisies($_POST['libCom']);
$dtCreaCom=date("Y-m-d-H-i-s");
sql_insert('comment', "dtCreaCom,libCom,numArt,numMemb", "'$dtCreaCom','$libCom','$numArt','$numMemb'");


header('Location: ../../views/backend/comments/list.php');