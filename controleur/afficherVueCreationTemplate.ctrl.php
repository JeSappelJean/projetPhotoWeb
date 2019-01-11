<!--Affichage de la vueCreationTemplate-->
<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();
  if (isset($_SESSION['login'])){
    $currentLogin = $_SESSION['login'];
  }

  include_once('../model/DAO.class.php');

  /*Ouverture vueCreationTemplate*/
  include('../vues/vueCreationTemplate.php');
 ?>
