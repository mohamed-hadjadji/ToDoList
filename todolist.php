<?php
session_start();

if (isset($_SESSION['login']))
{
 
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

	    <header class="headto">	        
	        <nav class="navbar navbar-light" style="background-color: #25496d;">
	        	<div class="nav">
		        	<h2 class="">To Do List</h2>
		            <h3><a href="index.php?deconnexion=true">Déconnexion</a></h3>
		        </div>
	        </nav>
	        
	    </header>

	    <main>
	        
	            <section class="container" style="background-color: #25496d;">
	            	<article class="newtach">
	            		<h2 class="text-center" style="color: white;">Tâches à faire</h2>
	            		<div class="form">
	            			<div id="forma">
				            	<input class="form-control mr-sm-2" id='ajout-tache' placeholder='Ajouter une Tache' type='text' name="nom">
					            <button class="btn btn-outline-success my-2 my-sm-0" id='valid-tache'>Ajouter</button>
					        </div>
				        </div>
				    </article>
		            <article id="taches">
	   	
		            </article>
		        </section>
		        <section class="accomplie">
		        	<div id="acco" style="background-color: #25496d;">
		        	    <h2 class="text-center" style="color: white;">Tâches Accomplies</h2>
					    <article  id='tachefi'>

					    </article>
					</div>
				</section>
	        
	        
	    </main>
        <footer class="foot navbar-light" style="background-color: #25496d;">
            <p> Copyright 2020 Coding School | All Rights Reserved | Project by Mohamed HADJADJI & Olivier Crozet</p>
        </footer>
	</body>

</html>

<?php	
}
else
{
	echo "Connectez-vous d'abord";
}
