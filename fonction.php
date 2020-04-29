<?php


 include("class.php");
 session_start();

 $tache = new tache();

 $iduser = $_SESSION["id"];
 $nom = $_POST['titre'];

 
 $tache->newlist($nom, $iduser);
 

?>