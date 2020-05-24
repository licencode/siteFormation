
<?php
include_once 'principale.php';
include_once 'fonction.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$idUtilisateur = $_SESSION['id'];

//verification de l'utilisateur
if($_SESSION['id'] != null){
    var_dump($nom, $prenom, $email, $idUtilisateur);
    updateUtilisateur($nom, $prenom, $email, $idUtilisateur);
    var_dump(updateUtilisateur($nom, $prenom, $email, $idUtilisateur));
}else{
    echo "idUtilisateur introuvable.";
}

//header('Location:consultation.profil.php');
?>