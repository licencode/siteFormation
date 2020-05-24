<?php 
include_once 'principale.php';
include_once 'fonction.php';

$user = lireUtilisateur($_SESSION["id"]);

?>
	<h1> Profil </h1>
	<div class="titre">
		<h4> Detail </h4>
		<p> Nom : <?php echo $user["nom"] ?> </p>
		<p> Prenom: <?php echo $user["prenom"] ?> </p>
		<p> Email : <?php echo $user["adresseMail"] ?> </p>
		<p> Mot de passe : ***** </p>
		<li>
		<a href="modifier.utilisateur.php?numUtilisateur=<?php echo $user["idUtilisateur"] ?>">Modifier informations </a>
		</li>
		<li>
		<a href="supprimer.utilisateur.php?numUtilisateur=<?php echo $user["idUtilisateur"] ?>">Supprimer utilisateur</a>
		</li>
	</div>
		<p><h4>Formation : </h4></p>
	<?php
	//verifier la table concerne avec idUser
	$numSession = listeInscription($_SESSION['id']);
	if($numSession !== null):
		//sortir la liste de $numSession
		foreach ($numSession as $listSession) :
			$list = $listSession["numSession"];
			$nomFormation = lireSessionForm($list);
	?>
		<!-- liste des formations avec la possibilité de se desinscrit -->
		<div>	
			<p><?php echo $nomFormation["objectif"]; ?><br/></p>
			<a href="desinscrire.php" class="bouton1">Desinscrire</a>
		</div>
	<?php
		endforeach;
	endif;
	
	?>


</html>