<?php
  session_start();

    var_dump($_SESSION['login']);
    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }
    include('../vues/vueAccueil.php');
 ?>
