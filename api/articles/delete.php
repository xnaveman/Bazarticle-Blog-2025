<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numArt = ctrlSaisies($_POST['numArt']);


sql_delete('article', "numArt = $numArt");

$image = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
$chemin_image = "../../src/uploads/"."$image";
unlink($chemin_image);

header('Location: ../../views/backend/articles/list.php');