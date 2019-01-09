<!--Affichage de la vue vueCreationLivre-->
<?php
    //include_once('../model/DAO.class.php');
    session_start();

      if (isset($_SESSION['login'])){
        $currentLogin = $_SESSION['login'];
      }
    include('../vues/vueCreationLivre.php');
 ?>
