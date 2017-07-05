<?php
	include('./../src/includes/connexion.php');

	if( !isset($_SESSION['user']) || (isset($_SESSION['user']) && empty($_SESSION['user'])) ){
	  	$_SESSION['flashs'] = "Accès refusé";
	  	header('location:./../views/index.php');
	}
	
	$semaine = array(
		$date = new DateTime("+1 day"),
		$date = new DateTime("+2 day"),
		$date = new DateTime("+3 day"),
		$date = new DateTime("+4 day"),
		$date = new DateTime("+5 day"),
		$date = new DateTime("+6 day"),
		$date = new DateTime("+7 day"),
	);

	try{
	    $requete = 'SELECT * FROM horaire';
		$stmt = $connexion->prepare($requete);
		$stmt->execute();
		$horaires = $stmt->fetchAll();

		$requete = 'SELECT * FROM terrain';
		$stmt = $connexion->prepare($requete);
		$stmt->execute();
		$terrains = $stmt->fetchAll();

		$requete = 'SELECT * FROM reservation';
		$stmt = $connexion->prepare($requete);
		$stmt->execute();
		$reservations = $stmt->fetchAll();

	}catch(SqlException $e){ // Si une erreur SQL est déclenchée
		echo 'erreur lors de l\'accès à la base de données';
	}

