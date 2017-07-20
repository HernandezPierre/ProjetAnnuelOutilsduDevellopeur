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
<iframe name="InlineFrame1" id="InlineFrame1" style="width:690px;height:515px;" src="http://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=12&nb_mois_ligne=4&mois=1&an=0&langue=fr&texte_color=FFFFFF&week_color=FFFFFF&week_end_color=EDC43B&police_color=000000&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<?php 
	include('./footer.php');