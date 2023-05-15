<?php

    require_once('functions.php');

    if (isset($_POST["send"])) { //isset = si ca existe
        $bdd = connect(); //$bdd = a la fonction link

        $sql = "INSERT INTO users (`email`, `pseudo`, `password`) VALUES (:email, :pseudo, :password);"; // :email = il ya une valeur avant
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
</head>
<body>
<h1>Création du compte</h1>
    <?php require_once('_nav.php'); ?> <!-- appeler la page nav.php require-once pour l'appeler une fois et pour toujours-->


    <div class="form">
    <form action="" method="post"> <!--action = href / method = facon de l'envoie -->
        <!-- <div>
            <br>
            <label for="pseudo">Pseudo</label> cliquer sur email ca met dans l'input 
            <input class="form-field" type="pseudo" placeholder="Entrez votre pseudo" name="pseudo" id="pseudo">
        </div> -->

        <h2>Nouveau compte</h2>
        <hr>
        <div>
            
            <label for="email"></label> <!-- cliquer sur email ca met dans l'input -->
            <input class="form-field" type="email" placeholder="Entrez votre Email" name="email" id="email">
        </div>
        <div>
            <label for="password"></label> 
            <input class="form-field" type="password" placeholder="Entrez votre mot de passe" name="password" id="password">
        </div>

        <p>Vous avez déja un compte ? <a href="login.php" id="cliquer">Cliquer ici</a></p>
        <div>
            <input type="submit" class="btnconnexion" name="send" value="Créer"/>
        </div>
    </div>
    </form>
</body>
</html>



