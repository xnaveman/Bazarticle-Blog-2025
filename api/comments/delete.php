<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numCom = ctrlSaisies($_POST['numCom']);

sql_delete('comment', "numCom= $numCom");


header('Location: ../../views/backend/comments/list.php');