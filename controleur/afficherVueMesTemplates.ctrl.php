<!--Affichage de la vueMesTemplates-->
<?php
    //include_once('../model/DAO.class.php');
    session_start();

      if (isset($_SESSION['login'])){
        $currentLogin = $_SESSION['login'];
      }
    include('../vues/vueMesTemplates.php');
 ?>
