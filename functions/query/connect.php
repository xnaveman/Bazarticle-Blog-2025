<?php
// PDO connection
function sql_connect(){
    global $DB;

    // Vérifiez si les constantes sont définies
    if (!defined('SQL_HOST') || !defined('SQL_DB') || !defined('SQL_USER') || !defined('SQL_PWD')) {
        die('Erreur : Les constantes de connexion à la base de données ne sont pas définies.');
    }

    try {
        if (strpos($_SERVER['HTTP_HOST'], 'scalingo') !== false) {
            $DB = new PDO('mysql:host=' . SQL_HOST . ';charset=utf8;dbname=' . SQL_DB . ';port=' . SQL_PORT, SQL_USER, SQL_PWD);
        } else {
            $DB = new PDO('mysql:host=' . SQL_HOST . ';charset=utf8;dbname=' . SQL_DB, SQL_USER, SQL_PWD);
        }
        // Définir le mode d'erreur de PDO sur Exception
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}