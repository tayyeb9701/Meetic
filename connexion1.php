<?php
session_start();
class connect_to_meetic
{
    private $comdp;
    private $coemail;

    public function __construct($coemail, $comdp)
    {
        $this->coemail = $coemail;
        $this->comdp = $comdp;
    }

    public function getcoemail()
    {
        return $this->coemail;
    }
    public function getcomdp()
    {
        return $this->comdp;
    }
    public function setcoemail($coemail)
    {
        return $this->coemail = $coemail;
    }
    public function setcomdp($comdp)
    {
        return $this->comdp = $comdp;
    }

    public function estvalide()
    {
        return !empty($this->comdp) &&  !empty($this->coemail);
    }

    public function estemailvalide()
    {
        return filter_var($this->coemail, FILTER_VALIDATE_EMAIL);
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

// PARTIE CONNEXTION

if (isset($_POST['envoie'])) 
{
    $coemail = $_POST['coemail'];
    $comdp = sha1($_POST['comdp']);
    $user = new connect_to_meetic($coemail, $comdp);

    if(!$user->estvalide())
    {
        echo "<br>" . "Veuillez remplir les informations !";
    }
    elseif(!$user->estemailvalide())
    {
        echo "<br>" . " Veuillez mettre un email valide !";
    }
    elseif(!empty($_POST['coemail']) and !empty($_POST['comdp'])) 
    {
        $req1 = "SELECT * FROM user WHERE email = ? AND mdp = ?";
        $stmt1 = $pdo->prepare($req1);
        $stmt1->execute(array($coemail, $comdp));

        if($stmt1->rowCount() > 0)
        {
            $_SESSION['email'] = $coemail;
            $_SESSION['mdp'] = $comdp;
            $_SESSION['id'] = $stmt1->fetch()['id'];
            header('Location: compte.php');

        }
        else
        {
            echo "<br>" . "Votre mot de passe OU adresse n'est pas valide.";
        }
    } 
    
}
