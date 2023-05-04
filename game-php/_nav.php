<ul id="nav">
    <?php if (!isset($_SESSION['user'])) {?>

        <a href="register.php" class="btn" id="test0">Créer un compte</a></li>
        <a href="login.php" class="btn" id="test">Connexion</a></li>

    <?php }else { ?>

        <a href="index.php" class="btnall" id="home">Accueil</a></li>
        <!-- faire la partie compte avec les informations -->
        <a href="compte.php" class="btnall" id="compte">Compte</a>
        <a href="persos.php" class="btnall"><?php echo $_SESSION['user']['email'] ?></a></li>
        <a href="logout.php" class="btnall">Logout</a></li>

    <?php } ?>
</ul>