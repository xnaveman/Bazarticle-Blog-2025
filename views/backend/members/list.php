<?php
include '../../../header.php';
if(!isset($_SESSION)){
    session_start();
}
$membres = sql_select("MEMBRE", "*");
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Membres</h1>
            <?php
                if (!empty($_SESSION['errors'])) {
                    echo "<div class='fw-bold text-danger'>Erreurs de modification :</div>";
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<div class='fw-bold text-danger'>$error</div>";
                        }
                        unset($_SESSION['errors']);
                    }
                ?>
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
                                <a href="edit.php?numMemb=<?php echo($memb['numMemb']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numMemb=<?php echo($memb['numMemb']); ?>" class="btn btn-danger">Delete</a>
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