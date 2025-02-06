<?php 
require_once 'header.php';
sql_connect();
$numArt=$_GET['numArt'];
$article=sql_select("article", "*","numArt=".$numArt)[0];
$numThem=sql_select("article", "*","numThem=".$article['numThem'])[0]['numThem'];
$libThem=sql_select("thematique","libThem","numThem=".$numThem)[0]['libThem'];

?>
<header class="masthead" style="background-image: url('/src/uploads/<?php echo $article['urlPhotArt'];?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <div class="post-heading">
                            <h1> <?php echo $libThem; ?> <br> <?php echo $article['libTitrArt'];?></h1>
                            <h2 class="subheading"><?php echo $article['libAccrochArt'];?></h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <?php echo "<p>".$article['libChapoArt']."</p>"; ?>
                <?php echo "<p>".$article['parag1Art']."</p>"; ?>
                <?php echo "<h4>".$article['libSsTitr1Art']."</h4>"; ?>
                <?php echo "<p>".$article['parag2Art']."</p>"; ?>
                <?php echo "<h4>".$article['libSsTitr2Art']."</h4>"; ?>
                <?php echo "<p>".$article['parag3Art']."</p>"; ?>
                <?php echo "<p>".$article['libConclArt']."</p>"; ?>
            </div>
        </div>
</div>  
                
                


<?php require_once 'footer.php'; ?>