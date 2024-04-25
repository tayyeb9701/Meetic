<?php
include ('connexion1.php');

class mod
{
    private $modemail;
    private $modmdp;

    public function __construct($modemail, $modmdp)
    {

        $this->modemail = $modemail;
        $this->modmdp = $modmdp;
    }

        public function getcmodemail()
    {
        return $this->modemail;
    }
    public function getmodmdp()
    {
        return $this->modmdp;
    }
    public function setmodemail($modemail)
    {
        return $this->modemail = $modemail;
    }
    public function setcomdp($modmdp)
    {
        return $this->modmdp = $modmdp;
    }


    public function estvalide()
    {
        return !empty($this->modemail) &&  !empty($this->modmdp);
    }

    public function estemailvalide()
    {
        return filter_var($this->modemail, FILTER_VALIDATE_EMAIL);
    }
    
}
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



// PARTIE ECHO INFOS COMPTE 

$coemail = $_SESSION['email'];
$comdp = $_SESSION['mdp'];

$req= "SELECT * FROM user WHERE email LIKE '$coemail' AND mdp LIKE '$comdp'";
$stmt = $pdo->prepare($req);
$stmt->execute();
$cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($cours as $c)
{
    echo "<br>";
    echo "Nom :" ." ". $c['nom'];
    echo "<br>";
    echo "Prenom :" ." ". $c['prenom'];
    echo "<br>";
    echo "Date de naissance :" ." ". $c['naissance'];
    echo "<br>";
    echo "genre :" ." ". $c['genre'];
    echo "<br>";
    echo "Ville :" ." ". $c['ville'];
    echo "<br>";
    echo "Email :" ." ". $c['email'];
    echo "<br>";
    echo "loisire :" ." ". $c['loisir'];
    echo "<br>";    
}
?>