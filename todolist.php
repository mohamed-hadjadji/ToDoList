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
	    <script type = "text/javascript" src='https://code.jquery.com/jquery-3.4.1.js'></script>
	    <link rel='stylesheet' href=''>
	    <script type = "text/javascript" src='tdl.js'></script>
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
		                <input id='ajoutliste' placeholder='Ajouter une liste' type='text'>
		                <button id='validliste'>Ajouter une liste</button>
	            </article>
			    <article  id='tachefini'>
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
