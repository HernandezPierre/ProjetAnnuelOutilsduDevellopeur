<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  include('./../src/controllers/reservationController.php');

  include('./header.php');
  include('./menu.php'); 

  if(isset($_SESSION['flashs']) && !empty($_SESSION['flashs']) && sizeof($_SESSION['flashs'])>0){
		echo"<div class='alert alert-info col-md-2 col-md-offset-10' role='alert'>".$_SESSION['flashs']."</div>";
		unset($_SESSION['flashs']);
  }
?>

<div class="table-responsive col-md-10 col-md-offset-1">
  <table class="table rtable">
  	<tr>
	  	<th></th>
	  	<?php

	  		foreach($terrains as $terrain){
	  			?>
	  				<th><?php echo $terrain['name'] ?></th>
	  			<?php
	  		}

	  	?>
  	</tr>

  	<?php
	  	foreach($semaine as $jour){
	  		?>
	  		<tr>
	  			<th><?php echo date_format($jour, 'Y-m-d'); ?></th>
	  		<?php

	  		foreach($terrains as $terrain){
	  			?>
	  				<td><div class="btn-toolbar" role="toolbar" aria-label=".1">
						  <div class="btn-group" role="group" >
						  	<?php
	  							foreach($horaires as $horaire){		
	  									$cpt = 0;	
			  							foreach($reservations as $reservation){
			  								
			  								if(date_format($jour, 'Y-m-d') == $reservation['date'] && $terrain['id'] == $reservation['id_terrain'] && $horaire['id'] == $reservation['id_horaire']){
			  									$cpt++;
			  									if($reservation['open'] == "1"){
			  										?>
				  								<form method="POST" action="./fiche.php" class="col-md-3 rform">
					  								<input type="hidden" name="jour" value="<?php echo date_format($jour, 'Y-m-d'); ?>"/>
					  								<input type="hidden" name="terrain" value="<?php echo $terrain['id']?>"/>
						  							<input type="hidden" name="id" value="<?php echo $horaire['id']?>"/>
				  									<input type="submit" name="submit" class="btn-warning col-md-12" value="<?php echo $horaire['begin']."/".$horaire['end']?>"/>
				  								</form>
				  								<?php
			  									}
			  									else{
			  										?>
				  								<form method="POST" action="./fiche.php" class="col-md-3 rform">
					  								<input type="hidden" name="jour" value="<?php echo date_format($jour, 'Y-m-d'); ?>"/>
					  								<input type="hidden" name="terrain" value="<?php echo $terrain['id']?>"/>
						  							<input type="hidden" name="id" value="<?php echo $horaire['id']?>"/>
				  									<input type="submit" name="submit" disabled="disabled" class="btn-danger col-md-12" value="<?php echo $horaire['begin']."/".$horaire['end']?>"/>
				  								</form>
				  								<?php
			  									}
				  							}
	  									}
	  									if($cpt<1){
	  										?>
											<form method="POST" action="./fiche.php" class="col-md-3 rform">
				  								<input type="hidden" name="jour" value="<?php echo date_format($jour, 'Y-m-d'); ?>"/>
				  								<input type="hidden" name="terrain" value="<?php echo $terrain['id']?>"/>
					  							<input type="hidden" name="id" value="<?php echo $horaire['id']?>"/>
			  									<input type="submit" name="submit" class="btn-primary col-md-12" value="<?php echo $horaire['begin']."/".$horaire['end']?>"/>
											</form>
			  							<?php
	  									}
								}
							?> 
							</div>
					</div></td>
				<?php
			}
			?></tr><?php
	  	}

	 ?>
						
  </table>
  <table><tr>



</table>
</div>


<?php 
    include('./footer.php');