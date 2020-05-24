<!DOCTYPE html>
<html>
<?php 
/*
cette page est une tete de page qui initialise la session_start()
*/
include_once 'fonction.php';
session_start();
?>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
	
	<!-- top page -->
    <body >
        <div id="content">
    
            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                if (isset($_GET['deconnexion'])) { 
                   if($_GET['deconnexion']==true) {
                      session_unset();
                      header("location:index.php");
                   }
                }
                else if ($_SESSION['id'] !== "") {
                    $user = lireUtilisateur($_SESSION['id']);
                    // afficher un message
                    echo "<br>Bonjour {$user['nom']} vous êtes connectés";
                }
                
            ?>
            <a href="accueil.php">revenir à la page d'accueil</a>
        </div>

