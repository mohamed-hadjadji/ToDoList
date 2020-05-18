<?php
session_start();
                
if(isset($_GET['deconnexion']))
{ 
    if($_GET['deconnexion']==true)
    {  
        session_unset();
        header("location:index.php");
    }
}
                

if(!isset($_SESSION['login']))
{
      
    include("class/class.php");
	
    $user = new user();

    if (isset($_POST['inscription'])) 
    {
        $user->register($_POST['login'], $_POST['mdp1'], $_POST['mdp2']);
    }

    if (isset($_POST['connexion'])) 
    {
        $user->connect($_POST['login'], $_POST['mdp']);
    }

    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="styles/tdl.css">
        <title>Accueil</title>
        </head>
        <body class="body">
            <header class="header">
                <nav class="navbar navbar-light" style="background-color: #25496d;">
                    <h2 class="">To Do List</h2>
                    <form class="form-inline" method='POST'>
                        <input class="form-control mr-sm-2" type='text' placeholder="Login" name='login' required>
                        <input class="form-control mr-sm-2" type='password' placeholder="Mot de passe" name='mdp' required>
                        <button class="btn btn-outline-success my-2 my-sm-0" type='submit' name='connexion'>Connexion</button>
                            <?php
                                    if(isset($_GET['erreur']))
                                    {
                                        $err = $_GET['erreur'];
                                        if($err==1 || $err==2)
                                            echo "<p class='erreur'><b>*Utilisateur ou mot de passe incorrect*</b></p>";
                                    }
                                    
                            ?>
                    </form>
                </nav>
            </header>
            <main>
                <section class="container navbar-light" style="background-color: #25496d;">
                        <h1 class="text-center"> Inscription </h1>

                        <form method='POST'>
                            <div class="form-row">
                                <div class="col my-4">
                                    <input class="form-control" type='text' placeholder="login" name='login' required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col my-4">
                                    <input type='password' class="form-control" placeholder="Mot de passe" name='mdp1' required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col my-4">
                                    <input type='password' class="form-control"  placeholder="Confirmation mot de passe" name='mdp2' required>
                                </div>
                            </div>
                            <?php
                                    if(isset($_GET['erreur1']))
                                    {
                                        $err = $_GET['erreur1'];
                                        if($err==1 || $err==2)
                                            echo "<p class='erreur'><b>*Login existe déja !!</b></p>*";
                                    }

                                    if(isset($_GET['erreur2']))
                                    {
                                        $err = $_GET['erreur2'];
                                        if($err==1 || $err==2)
                                            echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
                                    }
                                    
                            ?>
                            <div class="bout row justify-content-center">
                                <button class="btn btn-outline-success my-4 my-sm-0" type='submit' name='inscription'>Inscription</button>
                            </div>

                        </form>
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
    echo "déja connecter";
}
?>