<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	include('./header.php');
	include('./menu.php');

	if(isset($_SESSION['flashs']) && !empty($_SESSION['flashs']) && sizeof($_SESSION['flashs'])>0){
		echo"<div class='alert alert-info col-md-2 col-md-offset-10' role='alert'>".$_SESSION['flashs']."</div>";

		session_unset($_SESSION['flashs']);
	}
?>
<div class="transbox">
<h1>Nous contacter au :</p></h1>
<h2>01.64.69.56.30</h2>
<h1>ou à l'adresse suivante:</h1>
<h2>8 av Carrosses , 77210 Avon</h2>
</div>
<style>
div.transbox {
    margin: 10%;
    width: 50%;
    border-radius: 20px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.8;
    filter: alpha(opacity=80);
    z-index 2; /* For IE8 and earlier */
}

div.transbox p {
    margin: 5%;
    font-weight: bold;
    color: #000000;

</style>
}
<?php 
	include('./footer.php');