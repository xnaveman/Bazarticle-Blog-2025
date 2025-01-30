<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/update.php';

$numThem = ctrlSaisies($_POST['numThem']);
$libThem = ctrlSaisies($_POST['libThem']);

sql_update('THEMATIQUE', "libThem = '$libThem'", "numThem = $numThem");

header('Location: ../../views/backend/thematiques/list.php');