<?php
    require_once('functions.php');

    if (!isset($_SESSION['user'])) { 
        header('Location: login.php'); // L majscule important
    }

    if (!isset($_SESSION['perso'])) { 
        header('Location: persos.php'); // L majscule important
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);

    $sth->execute();

    $donjons = $sth->fetchAll()
?>

<?php require_once('_header.php'); ?>
<div>
    <?php echo $_SESSION['perso']['name']; ?>

    <ul>
        <?php foreach($donjons as $donjon) { ?>
           <a href="donjons.play.php?id=<?php echo $donjon['id']; ?>"> 
                <?php echo $donjon['name']; ?>
            </a>

        <?php } ?>
    </ul>
</div>
</body>
</html>