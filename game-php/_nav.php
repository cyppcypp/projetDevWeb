<nav class="navbar">
    
    <?php if (!isset($_SESSION['user'])) {?>

        <a href="index.php" class="titre">Vortex</a>    

        <div class="nav_link">
        <ul>
        <a href="howtoplay.php" class="btn" id="test0">Comment jouer à Eternel Dominion</a></li>
        <a href="histoire.php" class="btn" id="test">Histoire du jeu</a></li>
        </ul>
        </div>

        

    <?php }else { ?>
 
        <div class="nav_link">
        <a href="index.php" class="btn" id="home">Accueil</a></li>
        <a href="persos.php" class="btn"><?php echo $_SESSION['user']['email'] ?></a></li>
        <a href="logout.php" class="btn">Logout</a></li>
        </ul>
        </div>
    <?php } ?>

</nav>