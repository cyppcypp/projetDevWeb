
<header class="persos">
<link rel="stylesheet" href="style/persos.css">
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

<button>
  Vos personnages
</button>
<!-- <h1 id="perso">Vos personnages</h1> -->

<?php require_once('_nav.php'); ?>

<div class="container">
    
    <div class="titreperso">
    <a class="btnperso" href="persos.add.php">Créer un personnage</a>
    </div>

    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg'] . "</div>";
    } ?>

    <table class="table">
        <thead>
            <tr>
                <!-- <th width="2%">ID</th> -->
                <th id="nom" class="gradient">Nom</th>
                <th width="20%" id="nom">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persos as $perso) { ?>
                <tr>
                   
                    <td id="nom">| <?php echo $perso['name']; ?></td>
                    <td> <br><br>
                        <a 
                            class="btnperso"
                            href="action.php?id=<?php echo $perso['id']; ?>" 
                        >Choisir</a>

                        <!-- <a 
                            class="btnperso"
                            href="persos.show.php?id=<?php echo $perso['id']; ?>" 
                        >Détails</a>

                        <a 
                            class="btnperso"
                            href="persos.edt.php?id=<?php echo $perso['id']; ?>" 
                        >Modifier</a>

                        <a 
                            class="btnperso"
                            href="persos.del.php?id=<?php echo $perso['id']; ?>" 
                            onClick="return confirm('Etes-vous sûr ?');"
                        >Supprimer</a>
                        <br>    
                    </td> -->

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
            </header>
</body>
</html>