<?php
// A la création du login, le pseudo ne doit pas exister. 
// Vérifier son absence en BDD avant l'insert
function get_ExistPseudo($pseudoMemb){
	global $DB;

    //connect to database
    if(!$DB){
        sql_connect();
    }

	$query = 'SELECT * FROM MEMBRE WHERE pseudoMemb = ?;';
	$result = $DB->prepare($query);
	$result->execute(array($pseudoMemb));
	return($result->rowCount());
}