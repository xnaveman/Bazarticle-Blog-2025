<?php

include("header.php");
require_once 'functions/query/select.php';

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos(strtolower($haystack), strtolower($needle)) !== false;
    }
}

$search_result = array();

if (isset($_POST)){
	$typerecherche = trim($_POST["typerecherche"]);
	$recherche = trim($_POST["recherche"]);
	if($typerecherche=="motcle"){
		$motclerechreche = sql_select("motcle", "*", 'libMotCle LIKE "%'.$recherche.'%"');
		foreach ($motclerechreche as $key => $motclere) {
			$motclearticle=sql_select("motclearticle","*","numMotCle=".$motclere["numMotCle"]);
			foreach ($motclearticle as $key => $motclee) {
				$articles[]=sql_select("article","*","numArt=".$motclee['numArt'])[0];
			}
		}
		
	}
	if($typerecherche=="thematique"){
		$thematiquerecherche=sql_select("thematique","*",'libThem LIKE "%'.$recherche.'%"')[0];
		$articles=sql_select("article","*","numThem=".$thematiquerecherche['numThem']);
	}
	if($typerecherche=="article"){
		$articles = sql_select("article","*",'libTitrArt LIKE "%'.$recherche.'%"');
	}
	
}
?>


<div class="row gx-4 gx-lg-5 justify-content-center">

<form id="signup_form"  class="col-md-10 col-lg-8 col-xl-7 " action="recherche.php" method="post">
<h2>Rechercher</h2>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="input-group mb-3">
                    <select name="typerecherche"class="form-select" style="max-width: 150px;">
                            <option value="motcle">Mot Clé</option>
                            <option value="thematique">Thématique</option>
                            <option value="article">Article</option>
                        </select>
                    <input type="text" required name="recherche"class="form-control" placeholder="Rechercher...">
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</form>
</div>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
<?php
foreach ($articles as $key => $article) {
                        echo '<a href="Article.php?numArt='.$article['numArt'].'">
                        <h4 class="article-title">'.$article['libTitrArt'].'</h4>
                        <p class="post-subtitle">'.$article['libChapoArt'].'</p>
                    </a>';
                    echo '<hr class="my-4" />';
}
?>
</div>
</div>
</div>
<?php
include("footer.php");

?>