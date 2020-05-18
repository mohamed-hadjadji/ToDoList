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
               header('Location: index.php?erreur1=1'); // login existe déja
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
              header('Location: index.php?erreur2=1'); // Les mots de passe doivent être identique
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
    private $iduser;
    public $nom;


    public function newtache($nom,$iduser)
    {
        $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');

        $reponseta = $connexion->query("SELECT * FROM taches WHERE nom='".$nom."' AND id_utilisateur='".$iduser."'");
        $resultache=$reponseta->fetchAll();

        if(empty($resultache))
        {
        $requeteta= $connexion->query("INSERT INTO taches (nom, date_creation, etat, id_utilisateur) VALUES ('$nom', NOW(), 'en-cours', '$iduser')");    
        }
    }

    public function gettache($iduser)
    {
      $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
      $reponseget = $connexion->query("SELECT nom, date_creation, etat, id FROM taches WHERE id_utilisateur= $iduser AND etat = 'en-cours' ORDER BY id ASC");
      $reponseget->execute();
      $resultat = $reponseget->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($resultat);
    }

    public function supptache($idtache)
    {
        $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
        $repensesup = $connexion->query("DELETE FROM taches WHERE id = '$idtache'");
        $repensesup->execute();
    }

    public function tachefini($idtache)
    {
        $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
        $repensefin = $connexion->query("UPDATE taches SET etat = 'accomplie', date_fin = NOW() WHERE id = '$idtache'");
        $repensefin->execute();
    }

    public function gettachea($iduser)
    {
      $connexion = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
      $reponsegeta = $connexion->query("SELECT nom, date_creation, etat, date_fin FROM taches WHERE id_utilisateur= $iduser AND etat = 'accomplie' ORDER BY id ASC");
      $reponsegeta->execute();
      $resultat = $reponsegeta->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($resultat);
    }

}


?>