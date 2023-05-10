<?php require_once('functions.php');


    if (!isset($_SESSION['user'])) { 
        header('Location: login.php'); 
    }

    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE user_id = :user_id";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'user_id' =>$_SESSION['user']['id']   
    ]);

    $persos = $sth->fetch(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<h1>Compte</h1>
    <?php require_once('_nav.php'); ?>

    
        