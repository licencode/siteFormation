<?php
include_once 'principale.php';
include_once 'fonction.php';

if(isset($_GET["numUtilisateur"])){
    $id = $_GET["numUtilisateur"];
    $utilisateur = lireUtilisateur($id);
    $nom = $utilisateur['nom'];
    $prenom = $utilisateur['prenom'];
    $email = $utilisateur['adresseMail'];
    
}else{
	header("location: consultation.profil.php");
}
?>
    <div id="container">
    <form method='post' action='modification.utilisateur.traitement.php'>
    
        <label><b>Nom actuel : <?php echo $nom; ?><br/></b></label>
        <label><b>Pour changer votre nom</b></label>
        <input type="text" value="" name="nom"  
                maxlength="45" pattern="^[-'çéèùa-zA-Z\s]{1,45}$" title="Saisir 1 caractères au minimum" >

        <label><b>Prenom actuel : <?php echo $prenom; ?><br/></b></label>
        <label><b>Pour changer votre prénom</b></label>
        <input type="text" value="" name="prenom"  
                maxlength="45" pattern="^[-'çéèùa-zA-Z\s]{1,45}$" title="Saisir 1 caractères au minimum" >

        <label><b>Email actuel : <?php echo $email; ?><br/></b></label>
        <label><b>Pour changer votre adresse mail</b></label>
        <input type="email" value="" name="email" title="Saisir un email valide" maxlength="70" />

        <input type="submit" value="Valider">
		<input type="reset" value="Effacer">
    </form>
    </div>
</html>
