<?php
session_start();
include_once('../model/DAO.class.php');
$BDD = new DAO();
  if (isset($_SESSION['login'])){
    $currentLogin = $_SESSION['login'];
  }
  $BDD->createTemplateVide($num,$_SESSION['login'],$theme,$nbpages,$_POST['partage'],false);
    include('../vues/vueSauvegardeNotification.php');
 ?>
