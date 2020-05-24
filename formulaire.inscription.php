<html>
	<head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
	<body>
		<div id="container">
			<form method='post' action='creation.utilisateur.php'>
				<label><b>Nom</b></label>
				<input type="text" name="nom" size="50" 
                	maxlength="45" pattern="^[-'çéèùa-zA-Z\s]{1,45}$" title="Saisir 1 caractères au minimum" required>
				
				<label><b>Prenom</b></label>
				<input type="text" name="prenom" size="50" 
                	maxlength="45" pattern="^[-'çéèùa-zA-Z\s]{1,45}$" title="Saisir 1 caractères au minimum" required>
				
				<label><b>Email</b></label>
				<input type="email" name="email" 
                	title="Saisir un email valide" maxlength="70" required>
				
				<label><b>Mot de passe</b></label>
				<input type="password" placeholder="Entrer le mot de passe" name="entrerPassword" required>
				
				<label><b>Status</b></label>
				<select name="status">
					<option value="autre">Autre</option>
					<option value="1">Benevole</option>
					<option value="2">Salarier</option>
				</select>

				<input type="submit" value="Valider">
				<input type="reset" value="Effacer">
			</form>
		</div>
	</body>
</html>