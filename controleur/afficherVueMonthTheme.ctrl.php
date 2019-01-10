<?php
  session_start();
    require_once('../model/DAO.class.php');
    $BDD = new DAO();
    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }
    include('../vues/vueMonthTheme.php');
 ?>
