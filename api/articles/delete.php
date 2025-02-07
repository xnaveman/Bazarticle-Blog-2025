<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/delete.php';
require_once '../../functions/query/select.php';

$numArt = ctrlSaisies($_POST['numArt']);

// Supprimer les commentaires associés à l'article
sql_delete('comment', "numArt = $numArt");

// Supprimer les likes associés à l'article
sql_delete('likeart', "numArt = $numArt");

// Supprimer les mots clés associés à l'article
sql_delete('motclearticle', "numArt = $numArt");

// Supprimer l'article
$image = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
$chemin_image = $_SERVER['DOCUMENT_ROOT'] . "/src/uploads/" . $image;
if (file_exists($chemin_image)) {
    unlink($chemin_image);
}
sql_delete('article', "numArt = $numArt");

header('Location: ../../views/backend/articles/list.php');
exit();
?>