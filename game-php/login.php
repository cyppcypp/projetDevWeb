<?php

    require_once('functions.php');

    if (isset($_POST["send"])) { //isset = si ca existe
        $bdd = connect(); //$bdd = a la fonction link
        //$dd($_POST);

        $sql = "SELECT * FROM users WHERE `email` = :email;";
        $sth = $bdd->prepare($sql); //on prepare la requete sql

        $sth->execute([
            'email' =>$_POST['email']   
        ]);

        $user = $sth->fetch();

        if ($user && password_verify($_POST['password'], $user['password']) ) {
            //dd($_POST);
            $_SESSION['user'] = $user;
            header('Location: persos.php');
        }else {
            $msg = "Email ou mot de passe incorrect ! ";
        }
                
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/form.css">
</head>
<body>
    <h1>Connexion</h1>
    <?php require_once('_nav.php'); ?>

    <form action="" method="post">

    <?php 
        if(isset($msg)) {
            echo "<div>" . $msg . "</div>";
        }?>
    
        <div>
        <div>
            <div>
            <br>
            <label for="pseudo">Pseudo</label> <!-- cliquer sur email ca met dans l'input -->
            <input class="form-field" type="pseudo" placeholder="Entrez votre pseudo" name="pseudo" id="pseudo">
            </div>
        
            <label for="email">Email</label> <!-- cliquer sur email ca met dans l'input -->
            <input class="form-field" type="email" placeholder="Entrez votre Email" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe</label> 
            <input class="form-field" type="password" placeholder="Entrez votre mot de passe" name="password" id="password">
        </div>
    </div>
    <div>
            <input type="submit" class="btnall" name="send" value="Connexion"/>
        </div>


    </form>

</body>
</html>