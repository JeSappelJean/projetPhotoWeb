<!--???-->
<?php
  session_start();

    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }
    include('../controleur/afficherAccueil.ctrl.php');
 ?>
