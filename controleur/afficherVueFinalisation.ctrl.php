<!--Affichage de la vueFinalisation-->
<?php
    //include_once('../model/DAO.class.php');
    session_start();

    require_once('../model/DAO.class.php');
    $BDD = new DAO();
    require_once('../model/template.class.php');

      if (isset($_SESSION['login'])){
        $currentLogin = $_SESSION['login'];
      }
    $template = $BDD->getInfoTemplate($_POST['num']);
    
    include('../vues/vueFinalisation.php');
 ?>
