<link rel="stylesheet" href="style/main.css">
<link rel="stylesheet" href="style/persos.show.css">
<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) { 
        header('Location: login.php');
    }

    if(!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;"; //select * = recuperer des infos

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   =>$_SESSION['user']['id']
    ]);
    $persos = $sth->fetch();
?>

    <?php require_once('_header.php'); ?>

    <h1>Détails du personnage</h1>

    <div class="px-4">
        <div class="p">
    <b>Nom:</b> <?php echo $persos['name']; ?><br>
    <b>Or:</b> <?php echo $persos['gold']; ?><br>
    <b>Force:</b> <?php echo $persos['for']; ?><br>
    <b>Dexterité:</b> <?php echo $persos['dex']; ?><br>
    <b>Charisme:</b> <?php echo $persos['char']; ?><br>
    <b>Vitesse:</b> <?php echo $persos['vit']; ?><br>
    <b>Point de vie:</b> <?php echo $persos['pdv']; ?><br>
    <br><br>
    </div>
</div>
    <a href="action.php" class="btnperso">Retour</a>

</body>
</html>


