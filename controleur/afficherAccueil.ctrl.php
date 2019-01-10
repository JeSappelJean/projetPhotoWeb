<!--Affichage de la vueAccueil -->

<?php
  session_start();

  if (isset($_SESSION['login'])){
    $currentLogin = $_SESSION['login'];
  }
    include('../vues/vueAccueil.php');
 ?>
