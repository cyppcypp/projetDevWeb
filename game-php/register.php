<?php

    require_once('functions.php');

    if (isset($_POST["send"])) { //isset = si ca existe
        $bdd = connect(); //$bdd = a la fonction link

        $sql = "INSERT INTO users (`email`, `password`) VALUES (:email, :password);"; // :email = il ya une valeur avant
        $sth = $bdd->prepare($sql); //on prepare la requete sql
        $sth->execute(['email' => $_POST['email'],'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]); //executer la requete / password_hash = crypter le mdp

        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
<div class="login">
    <?php require_once('_nav.php'); ?> <!-- appeler la page nav.php require-once pour l'appeler une fois et pour toujours-->


    <div class="form"> 
    <form action="" method="post" id=""> <!--action = href / method = facon de l'envoie -->
        
    <div class="background">
        <img src="img/femmenew.jpg" id="background">
        <h2>Nouveau compte</h2>
        </div>
        <hr>
        <div class="input-group">
    <label class="label">Adresse email</label>
    <input autocomplete="off" name="email" id="Email" class="input" type="email">
    <div></div></div>

    <div class="input-group">
    <label class="label">Mot de passe</label>
    <input autocomplete="off" name="password" id="Email" class="input" type="password">
    <div></div></div>

        <p>Vous avez déja un compte ? <a href="login.php" id="cliquer">Cliquer ici</a></p>
        <div>
            <input type="submit" class="btnconnexion" name="send" value="Créer"/>
        </div>
    </div>
    </form>
</div>
</body>
</html>



