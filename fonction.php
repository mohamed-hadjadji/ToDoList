<?php


 include("class.php");
 session_start();

 $tache = new tache();

if(isset($_POST["function"]) )
{
	$function= $_POST["function"];
 switch($function)	 
{
    case "newlist":
	
		$iduser = $_SESSION["id"];
		$nom = $_POST["nom"];

		$tache->newlist($nom, $iduser);
    break;

    case "afficherlist":

	
	    $iduser = $_SESSION["id"];
	    $tache->afficherlist($iduser); 
	break;  

}
}

 

?>