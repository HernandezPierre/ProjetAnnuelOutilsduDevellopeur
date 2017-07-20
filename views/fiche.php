
<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  
  include('./../src/controllers/ficheController.php');


  include('./header.php');
  include('./menu.php'); 
?>

<form class="fiche form-horizontal col-md-4 col-md-offset-4" method="POST" action="./../src/forms/ficheValidation.php">
	<fieldset>

	<!-- Form Name -->
	<legend><span class="col-md-12">Fiche de réservation </span><?php echo("<span id='titleFiche' class='col-md-offset-0'><em><b>".$terrain[0]['name']."</b></em> le <em><b>".$jour."</b></em> de <em><b>".$horaire[0]['begin']."</b></em> à <em><b>".$horaire[0]['end']."</b></em></span>") ?></legend>
	
	<input type="hidden" name="idTerrain" value="<?php echo $idTerrain ?>"/>
	<input type="hidden" name="idHoraire" value="<?php echo $idHoraire ?>"/>
	<input type="hidden" name="jour" value="<?php echo $jour ?>"/>

	<!-- Select Basic -->
	<div class="form-group ">
	  <label class="col-md-3 control-label" for="selectbasic">1er joueur</label>
	  <div class="col-md-7">
	    <input type="text" disabled="disabled" name="player1" class="form-control input-md" value="<?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['name']?>"/>
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group ">
	  <label class="col-md-3 control-label" for="selectbasic">2ème joueur</label>
	  <div class="col-md-7">
	    <select id="player2" name="player2" class="form-control">
	      <option value="-1">Undefined</option>
	      <?php
	      	foreach($players as $player){
	    
	      	?><option value="<?php echo $player['id']?>"><?php echo $player['firstname']?> <?php echo $player['name']?></option><?php
	      }
	      ?>
	    </select>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-3 control-label" for="selectbasic">3ème joueur</label>
	  <div class="col-md-7">
	    <select id="player3" name="player3" class="form-control">
	      <option value="-1">Undefined</option>
	       <?php
	      	foreach($players as $player){
	    
	      	?><option value="<?php echo $player['id']?>"><?php echo $player['firstname']?> <?php echo $player['name']?></option><?php
	      }
	      ?>
	    </select>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-3 control-label" for="selectbasic">4ème joueur</label>
	  <div class="col-md-7">
	    <select id="player4" name="player4" class="form-control">
	      <option value="-1">Undefined</option>
	       <?php
	      	foreach($players as $player){
	    
	      	?><option value="<?php echo $player['id']?>"><?php echo $player['firstname']?> <?php echo $player['name']?></option><?php
	      }
	      ?>
	    </select>
	  </div>
	</div>

	<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Ouvert à adversere(s)</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="yes" value="1">
      oui
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="no" value="0" checked="checked">
      non
    </label>
	</div>
  </div>
</div>
<div class="form-group">
	  <label class="col-md-3 control-label" for="selectbasic">Type de Reservation</label>
	  <div class="col-md-7">
	    <select id="typeR" name="typeR" class="form-control">
	     <option value="-1">Undefined</option>
	      <?php
	      print_r($TypeR);
	     
	      	foreach($TypeR as $TypeR){
	    
	      	?><option value="<?php echo $TypeR['id']?>"><?php echo $TypeR['libelle']?></option><?php
	      }
	      ?>
	    </select>
	  </div>
	</div>
	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-12">
	   	<a href="./reservation.php" class="col-md-2 col-md-offset-4 btn btn-danger">Annuler</a>
	    <input type="submit" id="singlebutton" value="Réserver" name="singlebutton" class="col-md-2 col-md-offset-1 btn btn-primary" />
	  </div>
	</div>

	

	</fieldset>
</form>


<?php 
    include('./footer.php');