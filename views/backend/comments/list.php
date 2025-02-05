<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all comments
$comments = sql_select("comment", "*");
$commentsattente = sql_select("comment", "*","dtModCom IS null");
$commentscontrole = sql_select("comment","*","dtModCom IS NOT null AND dellogiq=0");
$commentsarchive = sql_select("comment","*","dtModCom IS NOT null AND dellogiq=1");

?>

<!-- Bootstrap default layout to display all comments in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Commentaires</h1>
            <br>
            <a href="create.php" class="btn btn-success">Create</a>
            <br>
            <h2>Commentaires en attente de contrôle</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre Article</th>
                        <th>Pseudo</th>
                        <th>Date</th>
                        <th>Contenu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentsattente as $comment){ $article=sql_select("article", "*", "numArt = ".$comment['numArt']); 
                        $membre=sql_select("membre", "*", "numMemb = ".$comment['numMemb']);?>
                        
                        <tr>
                            <td><?php echo($article[0]['libTitrArt']); ?></td>
                            <td><?php echo($membre[0]['pseudoMemb']); ?></td>
                            <td><?php echo($comment['dtCreaCom']); ?></td>
                            <td><?php echo($comment['libCom']); ?></td>
                            <td>
                                <a href="edit.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-primary">Edit</a>
                                <a href="controle.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-warning">Contrôle</a>
                            </td>
                        </tr>
                    <?php } ?>
                   
                </tbody>
            </table>
            <h2>Commentaires controlés</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Dernière Modif</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison Refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentscontrole as $comment){ 
                            $membre=sql_select("membre", "*", "numMemb = ".$comment['numMemb']);?>
                        <tr>
                            <td><?php echo($membre[0]['pseudoMemb']); ?></td>
                            <td><?php echo($comment['dtModCom']); ?></td>
                            <td><?php echo($comment['libCom']); ?></td>
                            <td><?php if ($comment['attModOK']==1){echo "OUI";} else{
                                echo "NON";}?></td>
                            <td><?php echo($comment['notifComKOAff']); ?></td>
                           
                            <td>
                                <a href="edit.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2>Commentaires archivés</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Date Archive</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison Refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentsarchive as $comment){ 
                            $membre=sql_select("membre", "*", "numMemb = ".$comment['numMemb']);?>
                        <tr>
                            <td><?php echo($membre[0]['pseudoMemb']); ?></td>
                            <td><?php echo($comment['dtDelLogCom']); ?></td>
                            <td><?php echo($comment['libCom']); ?></td>
                            <td><?php if ($comment['attModOK']==1){echo "OUI";} else{
                                echo "NON";}?></td>
                            <td><?php echo($comment['notifComKOAff']); ?></td>
                           
                            <td>
                                <a href="edit.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numCom=<?php echo($comment['numCom']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer