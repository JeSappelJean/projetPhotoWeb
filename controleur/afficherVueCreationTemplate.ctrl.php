<!--Affichage de la vueCreationTemplate-->
<?php
  session_start();

    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }
    include_once('../model/DAO.class.php');
    include('../vues/vueCreationTemplate.php');
 ?>
