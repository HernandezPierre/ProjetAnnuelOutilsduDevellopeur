<nav class="navbar-fixed navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="./index.php">Avon Squash</a>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">

        <li><a href="./index.php">ACCUEIL</a></li>
        <li><a href="./plan_access.php">PLAN D'ACCES</a></li>
        <li><a href="./contact.php">CONTACT</a></li>
        <li><a href="#">PRESENTATION</a></li>
        <li><a href="#">PARTENAIRES</a></li>
        <li><a href="./agenda.php">AGENDA</a></li>
        <li><a href="./photo.php">PHOTO DU CLUB</a></li>
        <li><a href="./annonce.php">ANNONCES</a></li>
        <li><a href="#">HORAIRES / TARIFS</a></li>
        <li><a href="https://fr-fr.facebook.com/AvonSquash">FACEBOOK</a></li>
        <?php 
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){?>
        <li><a href="./reservation.php">RESERVATION</a></li>
        <?php } ?>
      </ul>
      <span class="navbar-right">
      <?php 
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
          echo("<p class='navbar-text'>".$_SESSION['user']['firstname']." ".$_SESSION['user']['name']."</p>");
          ?>
            <a href="./../src/includes/signout.php"><button type="button" class="btn btn-primary navbar-btn">Déconnexion</button></a>
          <?php
        }else{
          ?>
            <a href="./signin.php"><button type="button" class="btn btn-success navbar-btn">Connexion</button></a>
            <a href="./signup.php"><button type="button" class="btn btn-primary navbar-btn">Inscription</button></a>
          <?php
        }
      ?>
      </span>
    </div>
     
  </div>
</nav>