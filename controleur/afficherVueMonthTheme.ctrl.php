<!--Affichage de la vueMonthTheme-->
<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  if (isset($_SESSION['login'])){
    $currentLogin = $_SESSION['login'];
  }

  /*Récupération de DAO.class*/
  require_once('../model/DAO.class.php');
  $BDD = new DAO();

  /*Ouverture vueMonthTheme*/
  include('../vues/vueMonthTheme.php');
 ?>
