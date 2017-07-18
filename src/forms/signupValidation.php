<?php
	session_start();
	include('./../includes/connexion.php');

	$errors = array();
	

	if(isset($_POST['name']) && !empty($_POST['name'])){
		$name = htmlentities($_POST['name'], ENT_QUOTES);
	}else{
		$errors["name"]="Champ obligatoire";
	}

	if(isset($_POST['firstname']) && !empty($_POST['firstname'])){
		$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
	}else{
		$errors["firstname"]="Champ obligatoire";		
	}

	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
		$regex = "#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i";
		if (preg_match($regex, $email)){
			try{
	     		$requete = 'SELECT email FROM utilisateur WHERE email = ?';
				$stmt = $connexion->prepare($requete);
				$stmt->execute(array($email));
				$result = $stmt->fetchAll();
				if(sizeof($result)!==0){
					$errors['email'] = "Cet e-mail n'est pas disponible";
				}
			}catch(SqlException $e){ // Si une erreur SQL est déclenchée
				echo 'erreur lors de l\'accès à la base de données';
			}

		}else{
			$errors["email"]="email non valide";
		}
	}else{
		$errors["email"]="Champ obligatoire";	
	}

	if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confirmation']) && !empty($_POST['confirmation'])){
			
		$password = $_POST['password'];
		$confirmation = $_POST['confirmation'];
		if($password === $confirmation){
			$password = password_hash($password, PASSWORD_BCRYPT);
		}
		else{
			$errors["confirmation"]="Incorrect";
		}
	}else{
		
		$errors["password"]="Champ obligatoire";
		$errors["confirmation"]="Champ obligatoire";
	}

	if(sizeof($errors)<=0){ // Si le tableau d'erreur est vide : donc s'il n'y a pas d'erreur
		try{

			$requete = 'INSERT INTO utilisateur(name,firstname,email,password) VALUES(?, ?, ?, ?)';
			$stmt = $connexion->prepare($requete);
			$stmt->execute(array($name, $firstname, $email, $password));
			$_SESSION['user']['name'] = $name;
			$_SESSION['user']['firstname'] = $firstname;
			$_SESSION['user']['email'] = $email;
			$_SESSION['flashs'] = "Inscription réussie (".$email.")";
			header("Location:./../../views/index.php");

		}catch(SqlException $e){ // Si une erreur SQL est déclenchée
			echo 'erreur lors de l\'accès à la base de données';
		}
	}
	else{
		$_SESSION['flashs'] = $errors;
		header("Location:./../../views/signup.php");
	}

