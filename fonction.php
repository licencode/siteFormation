<?php
//note personnelle avec une requete UPDATE, INSERT INTO ... les variables de type $var doivent etre entre guillemet '$var'
//connexion PDO
//connexion à la base de données
function gestionnaireDeConnexionMysqli() {
    $db = null;
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'dbbm2l';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
           or die('pas de connexion to database');
	if (mysqli_connect_errno()) {
    	echo "Echec de la connexion: " . mysqli_connect_error();
    	exit();
	}
    return $db;
}

//creer profil utilisateur
function creerUtilisateurMysqli($nom, $prenom, $email, $enterPass, $status) {
    $db = gestionnaireDeConnexionMysqli();
    if ($db != null) {
		//ajouter un utilisateur dans la table utilisateur
		$req = "INSERT INTO utilisateur(nom, prenom, adresseMail, password, idStatus) VALUES ('$nom', '$prenom', '$email','$enterPass', '$status')";
		$requete_exec = mysqli_query($db, $req);
    }else {
		echo "Une erreur est survenue.";
	}
	return $requete_exec;
}

//recuperer les infos des utilisateurs a partir de l'idUtilisateur
function lireUtilisateur($id) {
	$db = gestionnaireDeConnexionMysqli();
    if ($db != NULL) {
		$req 		  = "SELECT * FROM utilisateur WHERE idUtilisateur = $id";
		$exec_requete = mysqli_query($db, $req);
		$user         = mysqli_fetch_array($exec_requete);
	}else {
		echo "Une erreur est survenue.";
	}
    return $user;
}

//recuperer les infos des formations appartir des status.utilisateur dans la table concerne
function statusConcerne($idStatus) {
	$db = gestionnaireDeConnexionMysqli();
    if ($db != NULL) {
		$req 		  = "SELECT numFormation FROM concerne WHERE idStatus = $idStatus";
		$exec_requete = mysqli_query($db, $req);
		//MYSQLI_ASSOC dans la requete permet d'afficher le nom dans le tableau
		$formations   = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
    return $formations;
}

//avoir un dans l'accueil a partir d'un numero de formation
function nomsFormation($numFormation) {
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req		   = "SELECT objectif FROM formation WHERE numFormation = $numFormation";
		$exec_requete  = mysqli_query($db, $req);
		$lesFormations = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $lesFormations;
}

//a partir du numero de formation sortir toutes les informations de la table formation
function lireFormation($numFormation){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req		   = "SELECT * FROM formation WHERE numFormation = $numFormation";
		$exec_requete  = mysqli_query($db, $req);
		$laFormation   = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $laFormation;
}

//a partir du numero de formation sortir toutes les informations de la table session
function listeSession($numFormation){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req 		  = "SELECT * FROM session WHERE numformation = $numFormation";
		$exec_requete = mysqli_query($db, $req);
		$listeSession = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $listeSession;
}

//recuperer les infos du lieu a partir de l'idlieu
function lireLieu($idLieu){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req 		  = "SELECT * FROM lieu WHERE idLieu = $idLieu";
		$exec_requete = mysqli_query($db, $req);
		$lieu 		  = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $lieu;
}

//recuperer les infos des intervenant a partir de l'idIntervenant
function lireIntervenant($idIntervenant){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req 		  = "SELECT * FROM intervenant WHERE idIntervenant = $idIntervenant";
		$exec_requete = mysqli_query($db, $req);
		$intervenant = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $intervenant;
}

//enregistrer des utilisateurs avec la table sinscrire pour valider leur inscription
function sincrire($idUser, $numSession){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		//requete d'ajout d'utilisateur et de session
		$req	 = "INSERT INTO sinscrire(idUtilisateur, numSession) VALUES ('$idUser', '$numSession'); ";
		$requete = mysqli_query($db, $req);
	}else {
		echo "Une erreur est survenue.";
	}
	return $requete;
}

//connaitre le nom de la session a partir de idUtilisateur de la sinscrire
function listeInscription($idUser){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req	 = "SELECT numSession FROM sinscrire WHERE idUtilisateur = $idUser";
		$exec_requete = mysqli_query($db, $req);
		$sessionInscrit = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $sessionInscrit;
}

//prend le numSession pour afficher le nom de la formation
function lireSessionForm($numSession){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req = "SELECT objectif FROM formation, session WHERE formation.numFormation = session.numFormation AND numSession = $numSession";
		$exec_requete    = mysqli_query($db, $req);
		$lireSessionForm = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $lireSessionForm;
}

//delete l'inscription avec les 2 identifiants
function desinscrire($idUser, $numSession){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		//requete de suppression d'inscription a une session
		$req	= "DELETE FROM sinscrire WHERE sinscrire.idUtilisateur = '$idUser' AND sinscrire.numSession = '$numSession'";
		$delete = mysqli_query($db, $req);
	}else {
		echo "Une erreur est survenue.";
	}
	return $delete;
}

//creer un compteur d'inscrit dans une session
function countSession($numSession){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		$req		  = "SELECT COUNT(idUtilisateur) AS nbInscrit FROM sinscrire WHERE numSession = $numSession;";
		$exec_requete = mysqli_query($db, $req);
		$count		  = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC);
	}else {
		echo "Une erreur est survenue.";
	}
	return $count;
}

//supprimer un compte
function suppression($idUser){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		//requete de suppression de idUtilisateur
		$req	= "DELETE FROM `utilisateur` WHERE `utilisateur`.`idUtilisateur` = '$idUser'";
		$delete = mysqli_query($db, $req);
	}else {
		echo "Une erreur est survenue.";
	}
	return $delete;
}

//mise a jour du profil sans changement de status
function updateUtilisateur($nom, $prenom, $email, $idUtilisateur){
	$db = gestionnaireDeConnexionMysqli();
	if ($db != NULL) {
		//modification de la table utilisateur
		$req	= "UPDATE `utilisateur` SET `nom` = '$nom', `prenom` = '$prenom', `adresseMail` = '$email' WHERE `utilisateur`.`idUtilisateur` = $idUtilisateur;";
		$update = mysqli_query($db, $req);
	}else {
		echo "Une erreur est survenue.";
	}
	return $update;
}

/* idée
//chercher l'id
function rechercheId($nom, $email) {
	$db = gestionnaireDeConnexionMysqli();
	if ($db != null) {
		$req = "SELECT idUtilisateur FROM utilisateur WHERE nom = $nom, email = $email";
		$exec_requete = mysqli_query($db, $req);
		$user = mysqli_fetch_array($exec_requete);
	}else {
		echo "Une erreur est survenue."; 
	}
	return $user;
}

//fonction permettant d'avoir les informations de l'utisateur
// Execution de la requête sql avec $db->query()
	$succes = $db->query($sql);
	if ($succes) {
		echo "Requete bien envoye";
	} 
	else {
		echo "Une erreur est survenue.";  
	}
// Requête simple
	$sql = "INSERT INTO eleve (nom, age) VALUES ('Bob', 19)";
	// Requête dynamique
	$sql = "INSERT INTO eleve (nom, age) VALUES ('" . $votre_nom . "', " . $votre_age . ")";
	// Requête dynamique avec variables protégées
	$sql = "INSERT INTO eleve (nom, age) VALUES ('" . $db->real_escape_string($votre_nom) . "', " . $db->real_escape_string($votre_age) . ")";

	// Execution de la requête sql avec $db->query()
	$succes = $db->query($sql);
*/

?>