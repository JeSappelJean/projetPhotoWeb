<!--Traitement pour le like ou le non like-->
<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  /*On récupère la class DAO*/
  require_once('../model/DAO.class.php');

  /*Vérification de l'état du like*/
  $userLiked = $dao->userLiked($_SESSION['login'],$_POST['id']);

  if($userLiked == true){
    echo "alreadyLike";
  } else {
    echo  "notLike";
  }
 ?>
