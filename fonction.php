<?php


 include("class.php");
 session_start();

 $tache = new tache();

 $function = $_POST["function"]; 

if($function ="newlist")
{
	
		$iduser = $_SESSION["id"];
		$nom = $_POST['titre'];

		$tache->newlist($nom, $iduser);
}
elseif($function="afficherlist")
{
	
	    $iduser = $_SESSION["id"];
	    $tache->afficherlist($iduser);   

}
 


 

?>



