<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$libThem = ctrlSaisies($_POST['libThem']);

sql_insert('THEMATIQUE', 'libThem', "'$libThem'");


header('Location: ../../views/backend/thematiques/list.php');