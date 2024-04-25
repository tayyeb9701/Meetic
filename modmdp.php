<?php
// PARTIE CO A LA DATABASE 

$utilisateur = NULL;
$dsn = 'mysql:dbname=my_meetic; host=localhost';
$user = 'tayyeb';
$password = 'Nerod';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print "Erreur !:" . $e->getMessage() . "<br>";
    die();
}


// PARTIE MOD MDP 

if (isset($_POST['validemdp']))
{
    $modmdp = sha1($_POST['modmdp']);
    $nouvmdp = sha1($_POST['nouvmdp']);
    $user = new mod($modmdp, $nouvmdp);

    if(!empty($_POST['modmdp']) and !empty($_POST['nouvmdp'] ))
    {
        $sql = "UPDATE user SET mdp = '$nouvmdp' WHERE mdp = '$modmdp' ";
        $stmt1 = $pdo->prepare($sql);
        $stmt1->execute();

        if($stmt1->rowCount() > 0)
        {
            echo "valide";
            header('Location: connexion.php');

        }
        else
        {
            echo "<br>" . "Votre mot de passe n'est pas valide.";
        }

    }
}

?>