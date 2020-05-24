<?php
include_once 'principale.php';
include_once 'fonction.php';

$utilisateur = lireUtilisateur($_SESSION['id']);
$_SESSION['status'] = $utilisateur['idStatus'];
$listFormConcerne = statusConcerne($utilisateur['idStatus']);

?>
<div class="titre">
	<H1>Accueil</H1>
</div>
<nav >
	<ul class="profil">

		<li><a href="consultation.profil.php">Votre profil</a></li>
			<!-- verifier le idStatus.status de idStatus.concerne -->
			<?php foreach ($listFormConcerne as $concerne) :
				$nomFormation = nomsFormation($concerne["numFormation"]);
			?>
	</ul>
</nav>
<nav>
	<ul>
	<!-- liste des formations avec leur noms -->
	<li><a href="type.de.formation.php?formation=<?php echo $concerne["numFormation"] ?>">
			<!-- $nomFormation est un double tableau, je prend la 2eme valeur avec ceci $nomFormation[0]["objectif"] -->
			Formation : <?php echo $nomFormation[0]["objectif"]; ?></a></li>
	</ul>

</nav>
<?php endforeach; ?>

</html>
