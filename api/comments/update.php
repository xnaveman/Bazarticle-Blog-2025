<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/update.php';
var_dump($_POST);
extract($_POST);
$numCom = ctrlSaisies($numCom);
$libCom = ctrlSaisies($libCom);
$attModOK = ctrlSaisies($attModOK);
$notifComKOAff = ctrlSaisies($notifComKOAff);
$dellogiq = ctrlSaisies($dellogiq);
$dtModCom=date("Y-m-d-H-i-s");
if ($dellogiq==1){
    $dtDelLogCom=date("Y-m-d-H-i-s");
    sql_update('comment', "libCom = '$libCom', attModOK='$attModOK', notifComKOAff='$notifComKOAff',dtDelLogCom='$dtDelLogCom',dellogiq='$dellogiq',dtModCom='$dtModCom'", "numCom = $numCom");
} else {
    sql_update('comment', "libCom = '$libCom', attModOK='$attModOK', notifComKOAff='$notifComKOAff',dellogiq='$dellogiq',dtModCom='$dtModCom'", "numCom = $numCom");
}


header('Location: ../../views/backend/comments/list.php');