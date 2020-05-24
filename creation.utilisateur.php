<?php
include_once 'principale.php';
include_once 'fonction.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$enterPass = $_POST['entrerPassword'];
$status = $_POST['status'];

creerUtilisateurMysqli($nom, $prenom, $email, $enterPass, $status);

header('Location:inscription.reussi.php');


?>