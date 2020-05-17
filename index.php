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
            <link rel="stylesheet" type="text/css" href="">
        <title>Accueil</title>
        </head>
        <body class="">
            <header>

            <form action='' method='POST'>
                    <label> Login </label>
                    <input type='text' name='login' required>
                    <label> Mot de passe </label>
                    <input type='password' name='mdp' required>
                    <input type='submit' name='connexion' value='connexion'>
                    <?php
                            if(isset($_GET['erreur']))
                            {
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2)
                                    echo "<p class='erreur'><b>*Utilisateur ou mot de passe incorrect*</b></p>";
                            }
                            
                    ?>
                </form>
            </header>
            <main>
                <h1> Inscription </h1>

                <form action='' method='POST'>
                    <label> Login </label>
                    <input type='text' name='login' required>
                    <label> Mot de passe </label>
                    <input type='password' name='mdp1' required>
                    <label> Confirmation mot de passe </label>
                    <input type='password' name='mdp2' required>
                    <input type='submit' name='inscription' value='inscription'>

                </form>  
            </main>
        </body>
    </html>
<?php
}
else
{
    echo "déja connecter";
}
?>