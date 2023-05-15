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

<p style="background-image: url(/img/backgroundcastle.avif);"></p>
<?php require_once('_header.php'); ?>
<h1>Action</h1>

<?php require_once('_nav.php'); ?>

<div class="container">

    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg'] . "</div>";
    } ?>

    <table class="table">
    
        <tbody>
            <?php foreach ($persos as $perso) { ?>
                <tr>
                    <td><?php echo $perso['id']; ?></td>
                    <td><?php echo $perso['name']; ?></td>
                    <td>
                        <a 
                            class="btnperso"
                            href="donjons.php?id=<?php echo $perso['id']; ?>" 
                        >Jouer</a>

                        <a 
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
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>