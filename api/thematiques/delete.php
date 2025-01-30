<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numThem = ctrlSaisies($_POST['numThem']);

sql_delete('THEMATIQUE', "numThem= $numThem");


header('Location: ../../views/backend/thematiques/list.php');