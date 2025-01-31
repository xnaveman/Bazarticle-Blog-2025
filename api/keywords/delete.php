<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/delete.php';

if (isset($_POST['numMotCle'])) {
    $numMotCle = intval(ctrlSaisies($_POST['numMotCle']));

    sql_delete('MOTCLE', "numMotCle = $numMotCle");

    header('Location: ../../views/backend/keywords/list.php');
}
?>