<?php


 include("class.php");
 session_start();

 $tache = new tache();

if(isset($_POST["function"]) ==  "newlist")
{

	
		$iduser = $_SESSION["id"];
		$nom = $_POST['titre'];

		$tache->newlist($nom, $iduser);
}

if(isset($_POST["function"]) == "afficherlist")
{
	
	    $iduser = $_SESSION["id"];
	    $tache->afficherlist($iduser);   

}

 

?>