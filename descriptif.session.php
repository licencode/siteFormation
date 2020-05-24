<?php
include_once 'fonction.php';
include_once 'principale.php';

//verifie numSession de la table session
if(isset($_GET["numSession"])){
    $idFormation = $_GET["numSession"];
    //prend le numero de session pour en faire une liste du tableau session
    $sessionForm = listeSession($idFormation);
    //prend la 2eme valeur du array
    $sessionTab = $sessionForm[0];
    //creation de la $_SESSION['numSession']
    $_SESSION['numSession'] = $sessionTab['numSession'];
}

?>
    <div class="content">

        <h1> Session </h1>
        <div class="present">
            <h3><p>Date : </h3></p>
            <p> Inscription avant : <?php echo $sessionTab['dateLimiteInsc']; ?></p>
            <p> Date de formation : <?php echo $sessionTab['dateSession']; ?></p>
            <p> Date de fin formation : <?php echo $sessionTab['dateDeFin']; ?></p>

            <p><h3> Intervenant : </h3></p>
            <?php 
            //liste d'intervenant
            $intervenant = lireIntervenant($sessionTab['idIntervenant']); 
            ?>
            <p> Nom : <?php echo $intervenant['nom']; ?></p>
            <p> Prenom : <?php echo $intervenant['prenom']; ?></p>
            <p> Titre : <?php echo $intervenant['titre']; ?></p>

            <p><h3> Lieu de formation : </h3></p>
            <?php 
            //liste de lieu
            $lieu = lireLieu($sessionTab['idLieu']);
            ?>
            <p> Nom : <?php echo $lieu['nom']; ?></p>
            <p> Adresse : <?php echo $lieu['adresse']; ?></p>
            <p> Code postal : <?php echo $lieu['codePostal']; ?></p>
            <p> Ville : <?php echo $lieu['ville']; ?></p>
            <p> Telephone : <?php echo $lieu['telephone']; ?></p>

            <!-- calcul le nombre place restante apres verification de la table sincrire
            je ne sais pas faire de trigger dans la bdd alors j'ai fonction basique sur le site -->
            <?php
            //cette fonction compte le nombre de personne inscrite
            $nbInscrit = countSession($_SESSION['numSession']);
            //je met les valeurs du tableau dans une variable pour pouvoir les calculer plus loin
            $nbInscr = $nbInscrit["nbInscrit"];
            $nbPlace = $sessionTab['nbPlace'];
            $nbPlaceRestante = ($nbPlace - $nbInscr);
            ?>
            <p> nombre de place disponible : 
                <?php
                if($nbPlaceRestante == 0){
                    echo "Plus de place";
                } else{
                    echo $nbPlaceRestante;
                }
            ?></p>
            <!-- un bouton pour inscription -->
            <p><h4>S'inscrire</h4></p>
            <a href="inscrire.php" class="bouton1">S'inscrire</a>
        </div>
        
    </div>