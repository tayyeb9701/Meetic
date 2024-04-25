<?php
class connect_to_db
    {
        private $nom;
        private $prenom;
        private $naissance;
        private $genre;
        private $ville;
        private $email;
        private $mdp;
        private $loisir;
       

        public function __construct($nom, $prenom, $naissance, $genre, $ville, $email, $mdp, $loisir)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->naissance = $naissance;
            $this->genre = $genre;
            $this->ville = $ville;
            $this->email = $email;
            $this->mdp = $mdp;
            $this->loisir = $loisir;
        
        }

        public function getnom()
        {
            return $this->nom;
        }
        public function getprenom()
        {
            return $this->prenom;
        }
        public function getnaissance()
        {
            return $this->naissance;
        }
        public function getgenre()
        {
            return $this->genre;
        }
        public function getville()
        {
            return $this->ville;
        }
        public function getemail()
        {
            return $this->email;
        }
        public function getmdp()
        {
            return $this->mdp;
        }
        public function getloisir()
        {
            return $this->loisir;
        }


        public function setnom($nom)
        {
            return $this->nom = $nom;
        }
        public function setprenom($prenom)
        {
            return $this->prenom = $prenom;
        }
        public function setnaissance($naissance)
        {
            return $this->naissance = $naissance;
        }
        public function setgenre($genre)
        {
            return $this->genre = $genre;
        }
        public function setville($ville)
        {
            return $this->ville = $ville;
        }
        public function setemail($email)
        {
            return $this->email = $email;
        }
        public function setmdp($mdp)
        {
            return $this->mdp = $mdp;
        }
        public function setloisir($loisir)
        {
            return $this->loisir = $loisir;
        }

        public function estvalide()
        {
            return !empty($this->nom) && !empty($this->prenom) && !empty($this->naissance) && !empty($this->genre) && !empty($this->ville) && !empty($this->email) && !empty($this->mdp) && !empty($this->loisir);
        }

        public function estemailvalide()
        {
            return filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }
    }

    // PARTIE CO A LA DATABASE 

    $utilisateur = NULL;
    $dsn = 'mysql:dbname=my_meetic; host=localhost';
    $user = 'tayyeb';
    $password = 'Nerod';

    try
    {
        $pdo = new PDO($dsn, $user, $password );
    }
    catch(PDOException $e)
    {
        print "Erreur !:" . $e->getMessage() . "<br>";
        die();
    }

    $req= "SELECT * FROM user";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $cours=$stmt->fetchAll(PDO::FETCH_ASSOC);

    
    // PARTIE INSCRIPTION

    if (isset($_POST['validation'])) 
    {
        $nom1 = $_POST['nom'];
        $prenom1 = $_POST['prenom'];
        $naissance1 = $_POST['naissance'];
        $genre1 = $_POST['genre'];
        $ville1 = $_POST['ville'];
        $email1 = $_POST['email'];
        $mdp1 = sha1($_POST['mdp']);
        $loisir1 = $_POST['loisir'];

        $utilisateur = new connect_to_db($nom1, $prenom1, $naissance1, $genre1, $ville1, $email1, $mdp1, $loisir1);

        if (!$utilisateur->estvalide()) 
        {
            echo "<br>" . "<h1>Veuillez remplir le formulaire ! </h1>";
        }
        elseif (!$utilisateur->estemailvalide()) 
        {
            echo "<br>" . " <h1>Veuillez mettre un email valide !</h1>";
        } 
        else 
        {
            $sql = "INSERT INTO user(nom, prenom, naissance, genre, ville, email, mdp, loisir) VALUES (:nom, :prenom, :naissance, :genre, :ville, :email, :mdp, :loisir)";
            $stmt=$pdo->prepare($sql);

            if($stmt)
            {
                $stmt->bindParam(':nom',$nom1);
                $stmt->bindParam(':prenom',$prenom1);
                $stmt->bindParam(':naissance',$naissance1);
                $stmt->bindParam(':genre',$genre1);
                $stmt->bindParam(':ville',$ville1);
                $stmt->bindParam(':email',$email1);
                $stmt->bindParam(':mdp',$mdp1);
                $stmt->bindParam(':loisir',$loisir1);

                $stmt->execute();

                
                if($stmt->rowCount()>0)
                {
                    echo "<br>" . "Inscription validé ! ";
                    header('Location: connexion.php');
                }
                else
                {
                    echo "erreur ! ";
                }
                $stmt->closeCursor();
                
            }
        }
    }


?>