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
	

<iframe class="col-md-offset-3" src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d84743.10829334981!2d2.648974737387624!3d48.41387957259012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e6!4m0!4m5!1s0x47e5f45a8d689eab%3A0xb86e17f14feffa34!2savon+squash!3m2!1d48.4139!2d2.717641!5e0!3m2!1sfr!2sfr!4v1430776146155" width="800" height="600" frameborder="0" style="border:0"></iframe>

<?php 
	include('./footer.php');