<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numStat = ctrlSaisies($_POST['numStat']);

//create function with an exception
function checkMembre($numStat) {
    $test=sql_select("membre",'*',"numStat=".$numStat);
    if(count($test)!=0) {
      throw new Exception("Ce status est déjà utilisé par des membres, il ne peut pas être supprimé <br>");
    }
    return true;
  }
  
  //trigger exception in a "try" block
  try {
    checkMembre($numStat);
  }
  
  //catch exception
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }


sql_delete('STATUT', "numStat = $numStat");



header('Location: ../../views/backend/statuts/list.php');