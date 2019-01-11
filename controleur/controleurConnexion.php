<!-- Controleur gestion de la connexion -->
<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  /*Récupération de la class DAO*/
  require_once('../model/DAO.class.php');

  /*Récupération de la class membres*/
  require_once('../model/membres.class.php');

  /*Conditions permettant de gérer les différents cas de connexion => 2 cas : connexion réussi | connexion erreur*/
  if ((empty($_POST['login']) || empty(md5($_POST['mdp']))) && (isset($_POST['login']) && isset($_POST['mdp']))) {
      include("../vues/vueConnexionErr.php");
  } else if (isset($_POST['login'])) {

      $data = $dao->getLoginMdp($_POST['login']);
      if (!empty($data)) {
          if ($data[0]->mdp == md5($_POST['mdp'])){
              $_SESSION['login'] = $data[0]->login;
              include('../vues/vueConnexionOk.php');
          }
          else {
              include("../vues/vueConnexionErr.php");
          }
      } else {
          include("../vues/vueConnexionErr.php");
        }
  } else {
      include('../vues/vueConnexionOk.php');
    }
?>
