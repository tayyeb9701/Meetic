<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MON COMPTE</title>
    <link rel="stylesheet" type="text/css" href="compte.css">

</head>
<body>
    <h1>Mon compte</h1>
    <br>
    <a href="inscription.php">S'inscrire</a>
    <a href="connexion.php">Se connecter</a>    
    <a href="accueil.php">accueil</a> 
    <br><br>
    <form action="" align="center">
    <?php
    include ('compte1.php');
    ?>
    </form>

    <form method="POST" action="" align="center">
    <h3>Modifier Email</h3>
    <label for="modemail">Email actuelle : </label>
    <input type="text" name="modemail" autocomplete="off">
    <br>
    <label for="modemail">Nouveau email : </label>
    <input type="text" name="nouvemail" autocomplete="off">
    <br><br>
    <input type="submit" name="valide">
    <br><br>
    </form>
    <?php include ('modemail.php');?>

    <form method="POST" action="" align="center">
    <h3>Modifier Mot de passe</h3>
    <label for="modmdp">Mot de passe actuelle : </label>
    <input type="password" name="modmdp" autocomplete="off">
    <br>
    <label for="nouvmdp"> Nouveau Mot de passe : </label>
    <input type="password" name="nouvmdp" autocomplete="off">
    <br><br>
    <input type="submit" name="validemdp">
    </form>
    <?php include ('modmdp.php');?>


    <form method="POST" action="" align="center" >
        <h3>Supprimer le compte</h3>
        <input type="submit" name="delete" value="Supprimer">
    </form>
    <?php include('suppcompte.php');?>
</body>
</html>
 