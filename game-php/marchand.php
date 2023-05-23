<link rel="stylesheet" href="style/main.css">
<link rel="stylesheet" href="style/marchand.css">
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

    
$style = 'display: flex; color: red; font-size: 20px; font-weight: bold; margin-top: 70px; margin-left: 600px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
color: white;';

$texte = "Vous n'avez pas asser d'or pour acheter un item.";

?>

<?php require_once('_header.php'); ?>

<div class="titremarchand"><h1>Marchand</h1></div>

<div class="px-4"> 
<?php require_once('_perso.php'); ?>
</div>

<p id="marchand"> Bienvenue chez le marchand ! Il est possible d'acheter des potions pour être plus fort. Voici la boutique que je te proposes. </p>
<br><br><br>
<a href="donjons.php" class="btnplayR">Retour</a>

<?php
                    if ($_SESSION['perso']['gold'] < 10) {
                        echo '<span style="' . $style . '">' . $texte . '</span>';
                        exit;
                    }
                    ?>
<table class="tableM">
        <tr id="top"><th>Potion</th><th>Prix</th><th>Action</th></tr>
        
                    

        <tr id="m"><td id="m">Force <img src="img/potionred.jpg" id="potion"></td><td id="m">10 or | +10 Force</td><td id="acheter" class="btnM"> 
            <?php
            
                    require_once("functions.php");

                    if (!isset($_SESSION['user'])) { 
                        header('Location: login.php');
                    }

                    if(!isset($_GET['id'])) {
                        header('Location: persos.php?msg=id non passé !');
                    }

                    else{
                    /// crée une liste / faire la'utre page
                    $bdd = connect();

                    $sql="UPDATE perso SET `gold` = :gold,  `for`=:for WHERE user_id = :user_id AND id = :id"; //select * = recuperer des infos

                    $sth = $bdd->prepare($sql);

                    $sth->execute([
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   =>$_SESSION['user']['id'],
                        'gold'        =>$_SESSION['perso']['gold'] -10,
                        'for'       =>$_SESSION['perso']['for'] +10,

                        
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] -10;
                    $_SESSION['perso']['for'] = $_SESSION['perso']['for'] +10;
                    $_SESSION['perso']['dex'] = $_SESSION['perso']['dex'] -10;
                    $_SESSION['perso']['int'] = $_SESSION['perso']['int'] -10;
                    $_SESSION['perso']['vit'] = $_SESSION['perso']['vit'] -10;


                    $persos = $sth->fetch();

                    $_GET['id'];
                }
            
                    ?>
                Acheter</td></tr> 

                <?php
                    if ($_SESSION['perso']['gold'] < 10) {
                        exit;
                    }
                    ?>

        <tr id="m"><td id="m">Dextérité <img src="img/potionbleu.gif" id="potion"></td><td id="m">10 or | +10 Dextérité</td><td id="acheter" class="btnM">
                    <?php

                    
                    require_once("functions.php");

                    if (!isset($_SESSION['user'])) { 
                        header('Location: login.php');
                    }

                    if(!isset($_GET['id'])) {
                        header('Location: persos.php?msg=id non passé !');
                    }

                    else{
                    /// crée une liste / faire la'utre page
                    $bdd = connect();

                    $sql="UPDATE perso SET `gold` = :gold,  `dex`=:dex WHERE user_id = :user_id AND id = :id"; //select * = recuperer des infos

                    $sth = $bdd->prepare($sql);

                    $sth->execute([
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   =>$_SESSION['user']['id'],
                        'gold'        =>$_SESSION['perso']['gold'] -10,
                        'dex'       =>$_SESSION['perso']['dex'] +10,

                        
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] -10;
                    $_SESSION['perso']['dex'] = $_SESSION['perso']['dex'] +10;
                    


                    $persos = $sth->fetch();

                    $_GET['id'];
                }
                    
                    ?>
                    Acheter</td></tr>

                    <?php
                    if ($_SESSION['perso']['gold'] < 10) {
                        exit;
                    }
                    ?>

        <tr id="m"><td id="m">Intélligence <img src="img/potionverte.jpg" id="potion"></td><td id="m">10 or | +10 Intélligence</td><td id="acheter" class="btnM">
                    <?php
                    
                    require_once("functions.php");

                    if (!isset($_SESSION['user'])) { 
                        header('Location: login.php');
                    }

                    if(!isset($_GET['id'])) {
                        header('Location: persos.php?msg=id non passé !');
                    }


                    else{
                    /// crée une liste / faire la'utre page
                    $bdd = connect();

                    $sql="UPDATE perso SET `gold` = :gold,  `int`=:int WHERE user_id = :user_id AND id = :id"; //select * = recuperer des infos

                    $sth = $bdd->prepare($sql);

                    $sth->execute([
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   =>$_SESSION['user']['id'],
                        'gold'        =>$_SESSION['perso']['gold'] -10,
                        'int'       =>$_SESSION['perso']['int'] +10,

                        
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] -10;
                    $_SESSION['perso']['int'] = $_SESSION['perso']['int'] +10;
                   


                    $persos = $sth->fetch();

                    $_GET['id'];
                }
                    
                    ?>
                    Acheter</td></tr>
                    <?php
                    if ($_SESSION['perso']['gold'] < 10) {
                        exit;
                    }
                    ?>
        <tr id="m"><td id="m">Vitesse <img src="img/potionvitesse.jpg" id="potion"></td><td id="m">10 or | +10 Vitesse</td><td id="acheter" class="btnM">
                    <?php
                    
                    require_once("functions.php");

                    if (!isset($_SESSION['user'])) { 
                        header('Location: login.php');
                    }

                    if(!isset($_GET['id'])) {
                        header('Location: persos.php?msg=id non passé !');
                    }


                    else{
                    /// crée une liste / faire la'utre page
                    $bdd = connect();

                    $sql="UPDATE perso SET `gold` = :gold,  `vit`=:vit WHERE user_id = :user_id AND id = :id"; //select * = recuperer des infos

                    $sth = $bdd->prepare($sql);

                    $sth->execute([
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   =>$_SESSION['user']['id'],
                        'gold'        =>$_SESSION['perso']['gold'] -10,
                        'vit'       =>$_SESSION['perso']['vit'] +10,

                        
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] -10;
                    $_SESSION['perso']['vit'] = $_SESSION['perso']['vit'] +10;
                


                    $persos = $sth->fetch();

                    $_GET['id'];
                }
                    
                    ?>
                    Acheter</td></tr>

                    <?php
                    if ($_SESSION['perso']['gold'] < 10) {
                        exit;
                    }
                    ?>
    </table>
    
    <?php  $bdd = connect();
    $sql = "UPDATE persos SET `gold` = :gold, `pdv` = :pdv WHERE id = :id AND user_id = :user_id;";    
    $sth = $bdd->prepare($sql);

    $sth->execute([
        'gold'      => $_SESSION['perso']['gold'],
        'pdv'       => $_SESSION['perso']['pdv'],
        'id'        => $_SESSION['perso']['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);
?>

        

    
</div>

</body>
</html>
