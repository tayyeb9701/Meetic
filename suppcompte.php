<?php
include ('modmdp.php');


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


// PARTIE SUPP COMPTE 

if (isset($_POST['delete']))
{
    $sql = "UPDATE user SET mdp = curdate() + 1 WHERE mdp = '$_SESSION[mdp]' ";
    $stmt1 = $pdo->prepare($sql);
    $stmt1->execute();
    header('Location: accueil.php');
}
?>