<?php
	session_start();
  header('Content-Type: text/html; charset=utf-8');
	if(isset($_SESSION['flashs']) && !empty($_SESSION['flashs'])){
		$errors = $_SESSION['flashs'];
		session_unset($_SESSION['flashs']);
	}
  include('./../views/header.php');
  include('./../views/menu.php'); 
?>


<form class="form-horizontal col-md-4 col-md-offset-4 suform" method="POST" action="./../src/forms/signupValidation.php">
<fieldset>

<!-- Form Name -->
<legend>Inscription</legend>

<!-- Text input-->

<div class="form-group <?php echo(isset($errors['name']))?'has-error':''?>">
  <label class="col-md-3 control-label" for="textinput">Nom</label>  
  <div class="col-md-6">
    <input id="textinput" name="name" type="text" placeholder="nom" class="form-control input-md">
    <?php echo(isset($errors['name']))?'<span class="text-danger">'.$errors['name'].'</span>':'';?>
  </div>
</div>

<!-- Text input-->
<div class="form-group <?php echo(isset($errors['firstname']))?'has-error':''?>">
  <label class="col-md-3 control-label" for="textinput">Prénom</label>  
  <div class="col-md-6">
  <input id="textinput" name="firstname" type="text" placeholder="prénom" class="form-control input-md">
  <?php echo(isset($errors['firstname']))?'<span class="text-danger">'.$errors['firstname'].'</span>':'';?>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group <?php echo(isset($errors['email']))?'has-error':''?>">
  <label class="col-md-3 control-label" for="prependedtext">E-Mail</label>
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input id="prependedtext" name="email" class="form-control" placeholder="e-mail" type="text">
      
    </div>
    <?php echo(isset($errors['email']))?'<span class="text-danger">'.$errors['email'].'</span>':'';?>
  </div>
</div>

<!-- Password input-->
<div class="form-group <?php echo(isset($errors['password']))?'has-error':''?>">
  <label class="col-md-3 control-label" for="passwordinput">Mot de passe</label>
  <div class="col-md-6">
    <input id="passwordinput" name="password" type="password" placeholder="mot de passe" class="form-control input-md">
    <?php echo(isset($errors['password']))?'<span class="text-danger">'.$errors['password'].'</span>':'';?>
  </div>
</div>

<!-- Password input-->
<div class="form-group <?php echo(isset($errors['confirmation']))?'has-error':''?>">
  <label class="col-md-3 control-label" for="passwordinput">Confirmation mot de passe</label>
  <div class="col-md-6">
    <input id="passwordinput" name="confirmation" type="password" placeholder="confirmation" class="form-control input-md">
    <?php echo(isset($errors['confirmation']))?'<span class="text-danger">'.$errors['confirmation'].'</span>':'';?>
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button id="singlebutton" name="singlebutton" type="submit" class="col-md-4 col-md-offset-4 btn btn-primary">Envoyer</button>
  </div>
</div>

</fieldset>
</form>

<?php
		include('./../views/footer.php'); 