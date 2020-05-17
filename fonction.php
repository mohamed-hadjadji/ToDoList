<?php


 include("class/class.php");
 session_start();

if(!isset($tache))
{
 $tache = new tache();
}

if(isset($_POST['function']) || isset($_GET['function']))
{
	$function= $_POST["function"];

	 switch($function)	 
	{
		case "newtache":

		    $iduser = $_SESSION["id"];
		    $nom = $_POST["nom"];
		    $tache->newtache($nom, $iduser);
	    break;

	    case "gettache":
	        $iduser = $_SESSION["id"];
	        $tache->gettache($iduser);
	    break;

	    case "supptache":
	        $idtache = $_POST['id_tache'];
	        $tache->supptache($idtache);
	    break;

	    case "tachefini":
	        $idtache = $_POST['id_tache'];
	        $tache->tachefini($idtache);
	    break;

	    case "gettachea":
	        $iduser = $_SESSION["id"];
	        $tache->gettachea($iduser);
	    break;
	}
}

 

?>