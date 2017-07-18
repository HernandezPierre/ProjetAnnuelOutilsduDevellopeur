<?php
	session_start();

	include('./../includes/connexion.php');
	include('./../includes/fonctions.php');

	$errors = array();

	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
		
	}else{
		$errors["info"]="Informations incorrectes";	
	}

	if(isset($_POST['password']) && !empty($_POST['password'])){	
		$password = $_POST['password'];
		
	}else{
		$errors["info"]="Informations incorrectes";
	}

	if(sizeof($errors)<=0){ // Si le tableau d'erreur est vide : donc s'il n'y a pas d'erreur
		try{

			$requete = 'SELECT password FROM utilisateur WHERE email = ?';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($email));
			$result = $stmt->fetchAll();

			if(sizeof($result)>0 && password_verify($password, $result[0]['password'])){
				
				$requete = 'SELECT * FROM utilisateur WHERE email = ?';
				$stmt = $connexion->prepare($requete);
				$stmt->execute(array($email));
				$result = $stmt->fetchAll();
				if(sizeof($result)>0){
					$_SESSION['user']['id'] = $result[0]['id'];
					$_SESSION['user']['name'] = $result[0]['name'];
					$_SESSION['user']['firstname'] = $result[0]['firstname'];
					$_SESSION['user']['email'] = $result[0]['email'];
					header("Location:./../../views/index.php");
				}else{
					$errors["info"]="Informations incorrectes";
					$_SESSION['flashs'] = $errors;
					header("Location:./../../views/signin.php");
				}
			}else{
				$errors["info"]="Informations incorrectes";
				$_SESSION['flashs'] = $errors;
				header("Location:./../../views/signin.php");
			}
			

		}catch(SqlException $e){ // Si une erreur SQL est déclenchée
			echo 'erreur lors de l\'accès à la base de données';
		}
	}
	else{
		$_SESSION['flashs'] = $errors;
		header("Location:./../../views/signin.php");
	}

