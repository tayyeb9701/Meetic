<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="connexion.css">

</head>
<body>
    <main>
        <form method="POST" action="" align="center">
        <h1>Page de connexion</h1>
            <label for="coemail">Email : </label>
            <input type="text" name="coemail" autocomplete="off">
            <br>
            <label for="comdp">Mdp</label>
            <input type="password" name="comdp" autocomplete="off">
            <br><br>
            <input type="submit" name="envoie" value="Se connecter">
        </form>
        
        <a href="inscription.php">S'inscrire</a>
        <a href="accueil.php">Accueil</a>
    </main>
</body>
</html>
<?php
include ('connexion1.php');
?>