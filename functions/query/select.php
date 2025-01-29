<?php
// select instances
function sql_select($table, $attributs = '*', $where = null, $group = null, $order = null, $limit = null){
    global $DB;

    //connect to database
    if(!$DB){
        sql_connect();
    }

    //no prepare query for PDO
    $query = "SELECT " . $attributs . " FROM $table";
    if($where){
        $query .= " WHERE $where";
    }
    if($group){
        $query .= " GROUP BY $group";
    }
    if($order){
        $query .= " ORDER BY $order";
    }
    if($limit){
        $query .= " LIMIT $limit";
    }

    $result = $DB->query($query);
    
    $error = $DB->errorInfo();
    if($error[0] != 0){
        echo("Error: " . $error[2]);
    }else{
        $result = $result->fetchAll();
    }

    if(!$result){
        $result = array();
    }

    //return result
    return $result;
}