<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  /*On récupère la class DAO*/
  require_once('../model/DAO.class.php');

  /*Méthode permettant la suppresion du template;
  $dao->delTemplate($_GET['id']);

  /*On affiche la vueSuppressionOk*/
  include('../vues/vueSuppressionOk.php');

 ?>
