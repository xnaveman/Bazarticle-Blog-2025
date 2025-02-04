<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all comments
$comments = sql_select("comment", "*");
$commentsattente = sql_select("comment", "*",);
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
                        <th>Id</th>
                        <th>Nom des commentaires</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments as $comment){ ?>
                        <tr>
                            <td><?php echo($comment['numCom']); ?></td>
                            <td><?php echo($comment['libCom']); ?></td>
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