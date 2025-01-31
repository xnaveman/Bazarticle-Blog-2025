<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/update.php';

$numArt=$_GET['numArt'];

if (isset($_FILES)){
    if ($_FILES['urlPhotArt']['error']==0 && $_FILES['urlPhotArt']['size']<=10000000){
        $image = sql_select("article", "urlPhotArt", "numArt = $numArt")[0]['urlPhotArt'];
        $chemin_image = "../../src/uploads/"."$image";
        unlink($chemin_image);
        $nom_image=$_FILES['urlPhotArt']['name'];
        $extension = pathinfo($nom_image, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['urlPhotArt']['tmp_name'],"../../src/uploads/".$nom_image);
    }
}

$motcles=sql_select("motclearticle","numMotCle","numArt=$numArt");
$inputs=$_POST;
extract($inputs);
$libTitrArt = ctrlSaisies($libTitrArt);
$libChapoArt = ctrlSaisies($libChapoArt);
$libAccrochArt = ctrlSaisies($libAccrochArt);
$parag1Art = ctrlSaisies($parag1Art);
$libSsTitr1Art = ctrlSaisies($libSsTitr1Art);
$parag2Art = ctrlSaisies($parag2Art);
$libSsTitr2Art = ctrlSaisies($libSsTitr2Art);
$parag3Art = ctrlSaisies($parag3Art);
$libConclArt =ctrlSaisies($libConclArt);
$nom_image = ctrlSaisies($nom_image);
$numThem = ctrlSaisies($numThem);

sql_update('article', "libTitrArt = '$libTitrArt', libChapoArt = '$libChapoArt', libAccrochArt = '$libAccrochArt', parag1Art = '$parag1Art', libSsTitr1Art = '$libSsTitr1Art', parag2Art = '$parag2Art', libSsTitr2Art = '$libSsTitr2Art', parag3Art = '$parag3Art', libConclArt = '$libConclArt', urlPhotArt = '$nom_image', numThem = '$numThem'", "numArt = $numArt");

sql_delete("motclearticle","numArt=$numArt"); //supprimer les anciens mots clés

foreach ($inputs as $key => $value) { //ajouter les nouveaux mots clés
    if(is_numeric($key)){
        sql_insert("motclearticle","numArt,numMotCle","$numArt,$key"); 
    }
}

header('Location: ../../views/backend/articles/list.php');
