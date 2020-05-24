<?php
include_once 'principale.php';
include_once 'fonction.php';

//identifier idUtilisateur et le supprimer de la bdd
if(isset($_GET["numUtilisateur"])){
    $idUser = $_GET["numUtilisateur"];

    suppression($idUser);

 
}
header("location:index.php")

?>