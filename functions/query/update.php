<?php
// update instance
function sql_update($table, $attributs, $where) {
    global $DB;

    //connect to database
    if(!$DB){
        sql_connect();
    }

    try{
        $DB->beginTransaction();

        //prepare query for PDO
        $query = "UPDATE $table SET $attributs WHERE $where;";
        $request = $DB->prepare($query);
        $request->execute();
        $DB->commit();
        $request->closeCursor();
    }
    catch(PDOException $e){
        $DB->rollBack();
        $request->closeCursor();
        die('Error: ' . $e->getMessage());
    }

    $error = $DB->errorInfo();
    if($error[0] != 0){
        echo "Error: " . $error[2];
    }else{
        return true;
    }
}