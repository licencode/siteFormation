<?php
include_once 'principale.php';
include_once 'fonction.php';

$idUser = $_SESSION['id'];
$numSession = $_SESSION['numSession'];

//verification des sessions avant envoie de la requete
if($idUser != null && $numSession != null){
    //prend les valeurs de l' idUtilisateur et numSession pour envoyer sur la table sincrire
    sincrire($idUser, $numSession);
    header("Location:consultation.profil.php");
}else{
    echo "_session vide ou déjà utilisé";
}
?>