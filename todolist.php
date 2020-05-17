<?php
session_start();

if (isset($_SESSION['login']))
{
 echo "Bienvenue";


?>
<!DOCTYPE html>
<html lang="fr">

	<head>
	    <meta charset="UTF-8">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
	    
	    <script type = "text/javascript" src='js/tdl.js'></script>
	    <link rel='stylesheet' href='styles/tdl.css'>
	    <title> To Do List </title>
	</head>

	<body class=''>

	    <header>	        
	        <nav class="naviguer">
	            <span><a href="index.php?deconnexion=true">Déconnexion</a></span>
	        </nav>
	        
	    </header>

	    <main>
	        
	        <section class="sectionliste">
	            <article class="creatliste">
	   
		                <input id='ajout-tache' placeholder='Ajouter une Tache' type='text' name="nom">
		                <button id='valid-tache'>Ajouter</button>
		    
	            </article>
	            <div class="container ">
		            <article id="taches">
	   	
		            </article>
		        </div>
			    <article  id='tachefi'>
			    	<p>Taches Accomplies</p>
			    </article>
	        </section>
	        
	    </main>

	</body>

</html>

<?php	
}
else
{
	echo "Connectez-vous d'abord";
}
