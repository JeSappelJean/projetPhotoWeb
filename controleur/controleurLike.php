<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  /*On récupère la class DAO*/
  require_once('../model/DAO.class.php');

  /*Test avec condition pour vérifier si l'utilisateur souhaites like ou ne pas like*/
  $test = $dao->addLike($_SESSION['login'],$_POST['id']);

  if ($test == true && isset($_SESSION['login'])){
    echo "Like";
  } else if ($test == false && isset($_SESSION['login'])){
    $dao->unLike($_SESSION['login'],$_POST['id']);
    echo "Dislike";
  } else {
    echo "PasConnecte";
  }

?>
