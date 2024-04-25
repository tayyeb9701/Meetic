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


// PARTIE MOD EMAIL 

if (isset($_POST['valide']))
{
    $modemail = $_POST['modemail'];
    $nouvemail = $_POST['nouvemail'];
    $user = new mod($modemail, $nouvemail);

    if(!$user->estemailvalide())
    {
        echo " Veuillez mettre un email valide !";
    }
    elseif(!empty($_POST['modemail']) and !empty($_POST['nouvemail'] ))
    {
        $sql = "UPDATE user SET email = '$nouvemail' WHERE email = '$modemail' ";
        $stmt1 = $pdo->prepare($sql);
        $stmt1->execute();

        if($stmt1->rowCount() > 0)
        {
            echo "valide";
            header('Location: connexion.php');

        }
        else
        {
            echo "<br>" . "Votre adresse email n'est pas valide.";
        }

    }
}

?>