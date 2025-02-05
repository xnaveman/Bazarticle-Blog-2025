<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';
require_once '../../functions/query/select.php';

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = ctrlSaisies($_POST['username']);
    $password = ctrlSaisies($_POST['password']);

    $result = sql_select("MEMBRE", "*", "pseudoMemb = '$username'");

    if (!empty($result)) {
        $user = $result[0];

        //A CHANGER POUR LES MDP HASHED
        if ($password == $user['passMemb']) {
            $_SESSION['pseudoMemb'] = $user['pseudoMemb'];
            $_SESSION['numMemb'] = $user['numMemb'];
            $_SESSION['numStat'] = $user['numStat'];

            header('Location: /index.php');
            exit();
        } else {
            header('Location: /views/backend/security/login.php?error=1');
            exit();
        }
    } else {
        header('Location: /views/backend/security/login.php?error=1');
        exit();
    }
} else {
    header('Location: /views/backend/security/login.php?error=1');
    exit();
}
