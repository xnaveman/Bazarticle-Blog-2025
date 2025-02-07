<?php
include '../../header.php';
if (check_access(2) == false) {
    header('Location: /index.php');
    exit();
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap admin dashboard template -->
<div>
    <hr class="my-3">
    <div style="color: black; font-size: 30px; font-weight: 400; padding-left: 3rem ;word-wrap: break-word">Liens permettant d'administrer le Blog d'Articles</div>
    <hr class="my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Bienvenue sur le dashboard !</p>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Objets</th>
                            <th>Actions</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Statuts</td>
                            <td>
                                <a href="/views/backend/statuts/list.php" class="btn btn-primary">List</a>
                                <a href="/views/backend/statuts/create.php" class="btn btn-success">Create</a>
                            </td>
                            <td>
                                <p>Création et modification des statuts utilisateurs</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Membres</td>
                            <td>
                                <a href="/views/backend/members/list.php" class="btn btn-primary">List</a>
                                <a href="/views/backend/members/create.php" class="btn btn-success">Create</a>
                            </td>
                            <td>Management des membres, suppression, modification et création</td>
                        </tr>
                        <tr>
                            <td>Articles</td>
                            <td>
                                <a href="/views/backend/articles/list.php" class="btn btn-primary ">List</a>
                                <a href="/views/backend/articles/create.php" class="btn btn-success ">Create</a>
                            </td>
                            <td>Création, modification et publication des articles sur le blog</td>
                        </tr>
                        <tr>
                            <td>Thématiques</td>
                            <td>
                                <a href="/views/backend/thematiques/list.php" class="btn btn-primary">List</a>
                                <a href="/views/backend/thematiques/create.php" class="btn btn-success">Create</a>
                            </td>
                            <td>Management des thématiques des articles</td>
                        </tr>
                        <tr>
                            <td>Commentaires</td>
                            <td>
                                <a href="/views/backend/comments/list.php" class="btn btn-primary ">List</a>
                                <a href="/views/backend/comments/create.php" class="btn btn-success ">Create</a>
                            </td>
                            <td>Modération des commentaires</td>
                        </tr>
                        <tr>
                            <td>Mot-clés</td>
                            <td>
                                <a href="/views/backend/keywords/list.php" class="btn btn-primary ">List</a>
                                <a href="/views/backend/keywords/create.php" class="btn btn-success ">Create</a>
                            </td>
                            <td>Management des mots-clés pour les articles</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../../footer.php'; ?>