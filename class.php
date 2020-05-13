<?php

class user
{
	private $id;
	public $login;
	private $mdp;
    
    public function register($login,$mdp,$mdp2)
    {
        $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
        
        $login = $_POST['login'];
        $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
        
         if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $reponse = $connexion->query("SELECT* FROM utilisateurs WHERE login='".$login."'");
            $resultat=$reponse->fetchAll();
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login existe déja !!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = $connexion->query( "INSERT INTO utilisateurs (login,password)
                VALUES ('$login','$mdp')");      
            header('location:index.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }	
    }

     public function connect($login,$mdp)
   {
   	 $connexion =  mysqli_connect("localhost","root","","tdl");

   	 if(isset($_POST['login']) && isset($_POST['mdp']))
        {
             
            $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login']));
            $mdp = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['mdp']));

            if($login !== "" && $password !== "")
            {
                $requete = "SELECT count(*) FROM utilisateurs where
                login = '".$login."' ";
                $exec_requete = mysqli_query($connexion,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                $requete4 = "SELECT * FROM utilisateurs WHERE login='".$login."'";
                $exec_requete4 = mysqli_query($connexion,$requete4);
                $reponse4 = mysqli_fetch_array($exec_requete4);

                if( $count!=0 && $_SESSION['login'] !== "" && password_verify($mdp, $reponse4[2]) )
                {
            
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] = $reponse4[0];
               
                header('Location: todolist.php');
                }
                else
                {
                header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
        }
            
    }

}

class tache
{
    private $id;
    public $nom;

    public function newlist($nom,$iduser)
    {
    	$connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');

    	$reponse = $connexion->query("SELECT* FROM listes WHERE nom='".$nom."' AND id_utilisateur='".$iduser."'");
        $resultat=$reponse->fetchAll();

        if(empty($resultat))
        {
        $requete= $connexion->query("INSERT INTO listes (nom, id_utilisateur) VALUES ('$nom', '$iduser')");
        
        }

    }

    public function afficherlist($iduser)
    {
        $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');

       $requetaff = $connexion->query("SELECT nom FROM listes WHERE id_utilisateur= '". $iduser ."'");

       $resul=$requetaff->fetchAll();
       //echo json_encode($resul);
       //return $resul;
       foreach ($resul as $li) {
         echo $li[0];
       }
    }

}


?>