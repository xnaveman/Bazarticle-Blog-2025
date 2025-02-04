<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
if (isset($_FILES)){
    if ($_FILES['urlPhotArt']['error']==0 && $_FILES['urlPhotArt']['size']<=10000000){
        $nom_image=$_FILES['urlPhotArt']['name'];
        var_dump($nom_image);
        $extension = pathinfo($nom_image, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['urlPhotArt']['tmp_name'],"../../src/uploads/".$nom_image);
    }
}
$inputs=$_POST;
extract($inputs);
$dtCreaArt = date("Y-m-d H:i:s");
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
sql_insert("article","dtCreaArt,libTitrArt,libChapoArt,libAccrochArt,parag1Art,libSsTitr1Art,parag2Art,libSsTitr2Art,parag3Art,libConclArt,urlPhotArt,numThem","'$dtCreaArt','$libTitrArt','$libChapoArt','$libAccrochArt','$parag1Art','$libSsTitr1Art','$parag2Art','$libSsTitr2Art','$parag3Art','$libConclArt','$nom_image','$numThem'"); // table, attributs, values 

$numart=sql_select("article","MAX(numArt)");
foreach ($inputs as $key => $value) {
    if(is_numeric($key)){
        sql_insert("motclearticle","numArt,numMotCle",$numart[0][0].','.$key); 
    }
}
header('Location: ../../views/backend/articles/list.php');

