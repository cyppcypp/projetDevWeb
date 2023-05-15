<link rel="stylesheet" href="style/main.css">
<!-- <link rel="stylesheet" href="style/form.css"> -->
<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE user_id = :user_id";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'user_id'     => $_SESSION['user']['id']
    ]);

    $persos = $sth->fetchAll();

    // dd($persos);

?>

<?php require_once('_header.php'); ?>
<h1>Marchand</h1>

<?php require_once('_perso.php'); ?>
<p> Bienvenue chez le marchand ! Il est possible d'acheter des potions pour être plus fort. Voici la boutique que je te proposes. </p>

<table class="tableM">
        <tr><th>Potion</th><th>Prix</th><th>Action</th></tr>

        <tr id="m"><td id="m">Force</td><td id="m">10 or | +10 Force</td><td id="acheter" class="btnall">Acheter</td></tr><!--ligne du tableau=tr // contenue d'une celulle =td-->
        <tr id="m"><td id="m">Dextérité</td><td id="m">10 or | +10 Dextérité</td><td id="acheter" class="btnall">Acheter</td></tr>
        <tr id="m"><td id="m">Intélligence</td><td id="m">10 or | +10 Intélligence</td><td id="acheter" class="btnall">Acheter</td></tr>
        <tr id="m"><td id="m">Vitesse</td><td id="m">10 or | +10 Vitesse</td><td id="acheter" class="btnall">Acheter</td></tr>
    </table>
    <?php

    require_once("functions.php");

    if (!isset($_SESSION['user'])) { 
        header('Location: login.php');
    }

    if(!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    $sql="UPDATE persos SET `or` = :or,  `for`=:for WHERE user_id = :user_id AND id = :id"; //select * = recuperer des infos

    $sth = $bdd->prepare($sql);

    //$sth->execute([

    //     // switch {
    //     //     case :
            
    //     // }
    //     'id'        => $_GET['id'],
    //     'user_id'   =>$_SESSION['user']['id'],
    //     'or'        =>$_SESSION['user']['or'] -10,
    //     'for'       =>$_SESSION['user']['for'] +10,

    //     $_SESSION['user']['or'][] = $_SESSION['user']['or'] -10,
    //     $_SESSION['user']['for'][] = $_SESSION['user']['for'] +10,
    // ]);



    $persos = $sth->fetch();

    $_GET['id'];
    ?>
    
    
</div>
</body>
</html>
