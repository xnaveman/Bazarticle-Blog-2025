<?php
//PDO connection
function sql_connect(){
    global $DB;

    if (strpos($_SERVER['HTTP_HOST'], 'scalingo') === false) {
        $DB = new PDO('mysql:host=' . SQL_HOST . ';charset=utf8;dbname=' . SQL_DB . ';port=' . SQL_PORT, SQL_USER, SQL_PWD);
    } else {
        $DB = new PDO('mysql:host=' . SQL_HOST . ';charset=utf8;dbname=' . SQL_DB, SQL_USER, SQL_PWD);
}
}