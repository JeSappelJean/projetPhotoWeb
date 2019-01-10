<?php
session_start();
require_once('../model/DAO.class.php');
//var_dump("oui");
//if($likeOk == true){
//  $dao->unLike($_SESSION['login'],$_POST['id']);
$test = $dao->addLike($_SESSION['login'],$_POST['id']);

if ($test == true){
  echo "Like";
} else {
  $dao->unLike($_SESSION['login'],$_POST['id']);
  echo "Dislike";

}

//} else {
//  echo "Like";
//}
?>
