<!--Controleur de gestion d'inscription -->
<?php
  /*Récupération de la class DAO*/
  require_once('../model/DAO.class.php');

  /*On nomme les variables utiles à l'inscription*/
  $BDD = new DAO();
  $nbErr = 0;
  $login = $_POST['login'];
  $pass = md5($_POST['mdp']);
  $confirm = md5($_POST['mdpConfirm']);
  $listErr = array();

  /*On récupère les informations propre à l'utilisateur $login*/
  $mail_dispo=$BDD->getInfoMembre($login);

  /*Gestion des cas d'échec pour un même login*/
  if(!$mail_dispo) {
      array_push($listErr, "Votre mail est déjà utilisé par un membre");
      $nbErr++;
  }

  if ($nbErr==0) {
       /*On insere le membre $login dans la BD*/
       $BDD->insertMembre($login,$pass);
       $_SESSION['login'] = $login;
       /*On ouvre la vueConnexion*/
       include('../vues/vueConnexion.php');
   }
   else {
    /*On ouvre la vue Erreur*/
    include("../vues/vueErreurInscription.php");
   }
 ?>
