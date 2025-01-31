<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$membres = sql_select("MEMBRE", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Membres</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Pseudos des membres</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($membres as $memb){ ?>
                        <tr>
                            <td><?php echo($memb['numMemb']); ?></td>
                            <td><?php echo($memb['pseudoMemb']); ?></td>
                            <td>
                                <a href="edit.php?numStat=<?php echo($memb['numMemb']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numStat=<?php echo($memb['numMemb']); ?>" class="btn btn-danger">Delete</a>
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