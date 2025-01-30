<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$thematiques = sql_select("THEMATIQUE", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Thématiques</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom des thématiques</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($thematiques as $them){ ?>
                        <tr>
                            <td><?php echo($them['numThem']); ?></td>
                            <td><?php echo($them['libThem']); ?></td>
                            <td>
                                <a href="edit.php?numThem=<?php echo($them['numThem']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numThem=<?php echo($them['numThem']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer