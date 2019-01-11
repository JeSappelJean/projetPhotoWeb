<!--Controleur de gestion d'inscription -->
<?php
  require_once('../model/DAO.class.php');
  $BDD = new DAO();

  $nbErr = 0;
  $login = $_POST['login'];
  $pass = md5($_POST['mdp']);
  $confirm = md5($_POST['mdpConfirm']);
  $listErr = array();

  $mail_dispo=$BDD->getInfoMembre($login);

  if(!$mail_dispo) {
      $nbErr++;
  }

  if ($nbErr==0) {
       $BDD->insertMembre($login,$pass);
       $_SESSION['login'] = $login;
       include('../vues/vueConnexion.php');
   }
   else {
    include("../vues/vueErreurInscription.php");
   }
 ?>
