<?php
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
extract($_POST);
$dtModCom=date("Y-m-d-H-i-s");
$numCom = ctrlSaisies($_POST['numCom']);
$notifComKOAff=ctrlSaisies($notifComKOAff);
if ($attModOK==0){
    sql_update('comment',"'attModOK=$attModOK','dtModCom=$dtModCom'", "numCom= $numCom");
} else {
    sql_update('comment',"'notifComKOAff=$notifComKOAff','attModOK=$attModOK','dtModCom=$dtModCom'", "numCom= $numCom");
}



header('Location: ../../views/backend/comments/list.php');