<?php
	session_start();

	include('./../includes/connexion.php');
	include('./../includes/fonctions.php');


	if(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) && isset($_POST['player2']) && !empty($_POST['player2']) && isset($_POST['player3']) && !empty($_POST['player3']) && isset($_POST['player4']) && !empty($_POST['player4']) && isset($_POST['radios']) && isset($_POST['typeR']) && !empty($_POST['typeR'])){

		$player1 = htmlentities($_SESSION['user']['id'], ENT_QUOTES);
		$player2 = htmlentities($_POST['player2'], ENT_QUOTES);
		$player3 = htmlentities($_POST['player3'], ENT_QUOTES);
		$player4 = htmlentities($_POST['player4'], ENT_QUOTES);

		$idTerrain = htmlentities($_POST['idTerrain'], ENT_QUOTES);
		$idHoraire = htmlentities($_POST['idHoraire'], ENT_QUOTES);
		$jour = htmlentities($_POST['jour'], ENT_QUOTES);

		$open = $_POST['radios'];
		$typeR = htmlentities($_POST['typeR'], ENT_QUOTES);
		

		try{

			$requete = 'INSERT INTO reservation(id_terrain,id_first_player,id_second_player,id_third_player,id_fourth_player, date, id_horaire, open, TypeResa) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($idTerrain, $player1, $player2, $player3, $player4, $jour, $idHoraire, $open , $typeR));
			$_SESSION['flashs'] = "Réservation enregistrée";
			header("Location:./../../views/reservation.php");

		}catch(SqlException $e){ // Si une erreur SQL est déclenchée
			echo 'erreur lors de l\'accès à la base de données';
		}
	}
	else{
		$_SESSION['flashs'] = "Erreur lors de la réservation";
		header("Location:./../../views/reservation.php");
	}

