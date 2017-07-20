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
<ul class=photoul>
     <li class=photoli>
          <a class=photoa href="#">
          <img class=photoimg src="./../resources/img/selection.jpg" alt="" />
          <strong>Firefox</strong>
          </a>
     </li>
     <li class=photoli>
          <a class=photoa href="#">
          <img class=photoimg src="./../resources/img/raquette.jpg" alt="" />
          <strong>Opéra</strong>
          </a>
     </li>
<li class=photoli>
          <a class=photoa href="#">
          <img class=photoimg src="./../resources/img/balle.jpg" alt="" />
          <strong>Opéra</strong>
          </a>
     </li>
</ul>
<div class="background">
<div method="post" action="reception.php" enctype="multipart/form-data" class="transbox">
     <label class="col-md-offset-3" for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
     <input class="col-md-offset-3" type="hidden" name="MAX_FILE_SIZE" value="1048576" />
     <input class="col-md-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br />
     <label class="col-md-offset-3" for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input class="col-md-offset-3" type="text" name="titre" value="Titre du fichier" id="titre" /><br />
     <label class="col-md-offset-3" for="description">Description de votre fichier (max. 255 caractères) :</label><br />
     <textarea class="col-md-offset-3" name="description" id="description"></textarea><br />
     <input class="col-md-offset-3" type="submit" name="submit" value="envoyer" href="mailto:pierre.hernandez77940@gmail.com" />
</div>
</div>
<style>

.photoul .photoli{
     position:relative;float:left;
     width:100px;height:100px;padding:10px;list-style:none;
}

}
/*permet de créer deux lignes*/
.photoul .photoli:nth-child(4n){clear:left;} 
          
.photoul .photoli .photoa{
     display:block;overflow:hidden;
     width:100px;height:100px;
     margin-top:0px;margin-left:0px;
     border:0px solid rgba(0,0,0,0.7);
     transition-property:width,height,margin,z-index,border;
     transition-duration:0.4s;
}

.photoul .photoli .photoa:hover{
     position:absolute;
     width:200px;height:200px;
     margin-top:-56px;margin-left:-56px;
     z-index:100;
     border:6px solid rgba(0,0,0,0.7);
}
          
.photoul .photoli .photoa .photoimg{
     position:absolute;
     opacity : 0.9;
     filter : alpha(opacity=90);
     width:100px;height:100px;z-index:20;
     transition-property:width,height,
     z-index 100;
     transition-duration:0.4s;
}
          
.photoul .photoli .photoa .photoimg:hover{
     width:200px;height:200px;
     opacity : 1.0;
     filter : alpha(opacity=100);
     z-index:100;
}
div.background {
    background: url(zomm.png) repeat;
    border: 2px solid black;
}

div.transbox {
    margin: 30%;
    width: 30%;
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
}
</style>
	<?php 
	include('./footer.php');