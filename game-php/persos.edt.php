<?php 

    require_once("functions.php");

    if (!isset($_SESSION['user'])) { 
        header('Location: login.php');
    }

    if(!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    if (isset($_POST["send"])) { 
        if ($_POST['name'] !="") {
        $bdd = connect();

        $sql = "INSERT INTO persos (`name`, `for`, `dex`, `int`, `char`, `vit`, `pdv`, `user_id`) VALUES (:name, :for, :dex, :int, :char, :vit, :pdv, :user_id)";

        $sth = $bdd->prepare($sql);

        $sth->execute([
            'name'      => $_POST['name'],
            'for'       =>10,
            'dex'       =>10,
            'int'       =>10,
            'char'      =>10,
            'vit'       =>10,
            'pdv'       =>20,
            'user_id'      =>$_SESSION['user']['id']

        ]);

        header('Location: persos.php');

        }
    }

    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;"; //select * = recuperer des infos

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   =>$_SESSION['user']['id']
    ]);
    $persos = $sth->fetch();

    $_GET['id'];
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
    <?php require_once('_nav.php'); ?> 
        

    <form action="" method="post" >
        <h2>Editer votre personnage</h2>
        <hr>
        <div class="input-group">
    <label class="label">Nom</label>
    <input autocomplete="off" name="name" id="Email" class="input" type="name">
    <div></div></div>
    <br>
            <input type="submit" class="btnperso" value="Editer" name="send" >
        <div>

        </div>
    </form>

</body>

</html>