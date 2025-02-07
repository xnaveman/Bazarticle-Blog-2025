<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/update.php';
require_once '../../functions/query/select.php';

$numArt = intval($_POST['numArt']);

if (isset($_FILES['urlPhotArt']) && $_FILES['urlPhotArt']['error'] == 0 && $_FILES['urlPhotArt']['size'] <= 10000000) {
    $image = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
    $chemin_image = $_SERVER['DOCUMENT_ROOT'] . "/src/uploads/" . $image;
    if (file_exists($chemin_image)) {
        unlink($chemin_image);
    }
    $nom_image = $_FILES['urlPhotArt']['name'];
    $extension = pathinfo($nom_image, PATHINFO_EXTENSION);
    $new_filename = uniqid() . '.' . $extension;
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/src/uploads/" . $new_filename);
    $urlPhotArt = "/src/uploads/" . $new_filename;
} else {
    $urlPhotArt = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
}

$inputs = $_POST;
extract($inputs);
$dtMajArt = date("Y-m-d H:i:s");
$libTitrArt = ctrlSaisies($libTitrArt);
$libChapoArt = ctrlSaisies($libChapoArt);
$libAccrochArt = ctrlSaisies($libAccrochArt);
$parag1Art = ctrlSaisies($parag1Art);
$libSsTitr1Art = ctrlSaisies($libSsTitr1Art);
$parag2Art = ctrlSaisies($parag2Art);
$libSsTitr2Art = ctrlSaisies($libSsTitr2Art);
$parag3Art = ctrlSaisies($parag3Art);
$libConclArt = ctrlSaisies($libConclArt);

sql_update('article', "libTitrArt = '$libTitrArt', libChapoArt = '$libChapoArt', libAccrochArt = '$libAccrochArt', parag1Art = '$parag1Art', libSsTitr1Art = '$libSsTitr1Art', parag2Art = '$parag2Art', libSsTitr2Art = '$libSsTitr2Art', parag3Art = '$parag3Art', libConclArt = '$libConclArt', urlPhotArt = '$new_filename', dtMajArt = '$dtMajArt'", "numArt = $numArt");

// Mise à jour des mots clés
sql_delete('motclearticle', "numArt = $numArt");
if (isset($_POST['motcles'])) {
    foreach ($_POST['motcles'] as $numMotCle) {
        sql_insert('motclearticle', 'numArt, numMotCle', "$numArt, $numMotCle");
    }
}

header('Location: ' . ROOT_URL . '/views/backend/articles/list.php');
exit();
?>
