<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div id="content">
            <form>
                Félicitation vous êtes bien inscrit, nous vous invitons à vous déconnecter
                 et à vous reconnecter afin de tester la verification
            </form>
            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- demander à l'utilisateur de se logger-->
            <?php
                if (isset($_GET['deconnexion'])) { 
                   if($_GET['deconnexion']==true) {
                      session_unset();
                      header("location:index.php");
                   }
                }
            ?>
        </div>
    </body>
</html>