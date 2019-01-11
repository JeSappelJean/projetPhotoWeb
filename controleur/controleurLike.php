<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  /*On récupère la class DAO*/
  require_once('../model/DAO.class.php');

  /*Test avec condition pour vérifier si l'utilisateur souhaites like ou ne pas like*/
  $test = $dao->addLike($_SESSION['login'],$_POST['id']);

  if ($test == true){
    echo "Like";
  } else {
    $dao->unLike($_SESSION['login'],$_POST['id']);
    echo "Dislike";

}

?>
