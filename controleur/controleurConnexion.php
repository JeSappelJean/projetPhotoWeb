<!-- Controleur gestion de la connexion -->
<?php
  session_start();
  require_once('../model/DAO.class.php');
  require_once('../model/membres.class.php');

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
