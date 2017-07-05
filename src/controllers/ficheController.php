<?php
	include('./../src/includes/connexion.php');

	if( !isset($_SESSION['user']) || (isset($_SESSION['user']) && empty($_SESSION['user'])) ){
	  	$_SESSION["flashs"] = "Accès refusés";
	  	header('location:./../views/index.php');
	}

	if(isset($_POST['jour']) && !empty($_POST['jour']) && isset($_POST['terrain']) && !empty($_POST['terrain']) && isset($_POST['id']) && !empty($_POST['id'])){
		$jour = htmlentities($_POST['jour']);
		$idTerrain = htmlentities($_POST['terrain']);
		$idHoraire = htmlentities($_POST['id']);
	

		try{
			$requete = 'SELECT id, firstname, name FROM utilisateur WHERE email != ?';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($_SESSION['user']['email']));
			$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$requete = 'SELECT name FROM terrain WHERE id = ?';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($idTerrain));
			$terrain = $stmt->fetchAll();

			$requete = 'SELECT begin, end FROM horaire WHERE id = ?';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($idHoraire));
			$horaire = $stmt->fetchAll();
			
			$requete = 'SELECT id, libelle FROM TypeResa ';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($idHoraire));
			$TypeR = $stmt->fetchAll();
			

		}catch(SqlException $e){ // Si une erreur SQL est déclenchée
			echo 'erreur lors de l\'accès à la base de données';
		}

	}