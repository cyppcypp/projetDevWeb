<div class="loginback">
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
    
<div class="login"> 
    <?php require_once('_nav.php'); ?>
    <br> <br> <br> <br>
    
    <form action="" method="post" id="login">

    
    <?php 
        if(isset($msg)) {
            echo "<div>" . $msg . "</div>";
        }?>
    
   
    <div class="boxlogin">
     <img src="img/femme.jpg" id="login">
     <br>
            <h2>Connexion</h2>
            <br>
            <hr>
            
    </div>         
    <div class="input-group">
    <label class="label">Adresse email</label>
    <input autocomplete="off" name="email" id="Email" class="input" type="email">
    <div></div></div>

    <div class="input-group">
    <label class="label">Mot de passe</label>
    <input autocomplete="off" name="password" id="Email" class="input" type="password">
    <div></div></div>

        <p>Vous n'avez pas de compte ? <a href="register.php" id="cliquer">Créer un compte</a></p>
    <div>

            <input type="submit" class="btnconnexion" name="send" value="Connexion"/>
    </div>

    
</div>

</form>
</div>
</div>
</body>
</html>