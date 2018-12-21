<?php

if(isset($_POST['login']) && isset($_POST['mdp'])){
$login = "test";
$mdp = "test";
if($_POST['login'] == $login && $_POST['mdp'] == $mdp ){
    session_start();
    $_SESSION['user'] = $login;
    echo "ConnexionOk";
  } else {
    echo "ConnexionFail";
  }
}
?>
