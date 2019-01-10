<?php
session_start();
require_once('../model/DAO.class.php');
$userLiked = $dao->userLiked($_SESSION['login'],$_POST['id']);
if($userLiked == true){
  echo "alreadyLike";
} else {
  echo  "notLike";
}
 ?>
