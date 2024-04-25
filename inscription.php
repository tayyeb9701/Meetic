
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>My Meetic - Inscription</title>
    <link rel="stylesheet" type="text/css" href="inscription.css">
</head>

<body>
    <header>
    </header>
    <main>
        <h1>My Meetic</h1>
        <section>
            <div id="form">
            <form action="inscription.php" method="POST" align="center">
            <h1> Formulaire d'inscription</h1>
                <div>
                    <label>Nom:</label>
                    <input type="text" name="nom" id="nom" autocomplete="off"/>
                </div>
                <div>
                    <label>Prénom:</label>
                    <input type="text" name="prenom" id="prenom" autocomplete="off" />
                </div>
                <div>
                    <label for="naissance">Date de naissance:</label>
                    <input type="date" name="naissance" id="naissance" autocomplete="off"/>
                </div>
                <div>
                    <label>Genre:</label>
                    <select name="genre" id="genre">
                        <option value=""></option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div>
                    <label>Ville:</label>
                    <input type="text" name="ville" id="ville" autocomplete="off"/>
                </div>

                <div>
                    <label>Email:</label>
                    <input type="text" name="email" id="email" autocomplete="off"/>
                </div>
                <div>
                    <label>Mdp:</label>
                    <input type="password" name="mdp" id="mdp" autocomplete="off"/>
                </div>
                <div>
                    <label>Loisirs:</label>
                    <select name="loisir" id="loisir">
                        <option value="Jeux">Jeux</option>
                        <option value="cinema">Cinema</option>
                        <option value="lecture">Lecture</option>
                        <option value="sport">Sport</option>
                        <option value="informatique">informatique</option>
                    </select>
                </div>

                <div class="center">
                    <input id="bouton_valid" type="submit" name="validation" value="Valider" />
                </div>
            </form> 
            </div>
            <div>
            <a href="connexion.php">Se connecter</a>
            <a href="accueil.php">Accueil</a>
            </div>
        </section>
    </main>
</body>

</html>

<?php
    include ('inscription1.php');
?>
