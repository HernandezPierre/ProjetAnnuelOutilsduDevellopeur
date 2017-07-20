<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	include('./header.php');
	include('./menu.php');
	

	if(isset($_SESSION['flashs']) && !empty($_SESSION['flashs']) && sizeof($_SESSION['flashs'])>0){
		echo"<div class='alert alert-info col-md-2 col-md-offset-10' role='alert'>".$_SESSION['flashs']."</div>";

		session_unset($_SESSION['flashs']);
	}

	include('./footer.php');

		