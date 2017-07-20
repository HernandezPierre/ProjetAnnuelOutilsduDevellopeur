<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  if(isset($_SESSION['flashs']) && !empty($_SESSION['flashs'])){
    $errors = $_SESSION['flashs'];
    session_unset($_SESSION['flashs']);
  }

  include('./header.php');
  include('./menu.php'); 
?>


    <form class="form-horizontal col-md-4 col-md-offset-4 siform" method="POST" action="./../src/forms/signinValidation.php">
      <fieldset>

      <!-- Form Name -->
      <legend>Connexion  <?php echo(isset($errors['info']))?'<span class="text-danger"> infomations incorrectes</span>':'';?></legend>

      <!-- Prepended text-->
      <div class="form-group <?php echo(isset($errors['email']))?'has-error':''?>">
        <label class="col-md-3 control-label" for="prependedtext">E-Mail</label>
        <div class="col-md-7">
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input id="prependedtext" name="email" class="form-control" placeholder="e-mail" type="text">
            
          </div>
        </div>
      </div>

      <!-- Password input-->
      <div class="form-group <?php echo(isset($errors['password']))?'has-error':''?>">
        <label class="col-md-3 control-label" for="passwordinput">Mot de passe</label>
        <div class="col-md-7">
          <input id="passwordinput" name="password" type="password" placeholder="mot de passe" class="form-control input-md">
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <div class="col-md-12">
          <button id="singlebutton" name="singlebutton" type="submit" class="col-md-5 col-md-offset-4 btn btn-primary">Connexion</button>
        </div>
      </div>

      </fieldset>
    </form>

		<?php 
      include('./footer.php');