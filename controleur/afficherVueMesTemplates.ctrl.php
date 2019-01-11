<!--Affichage de la vueMesTemplates-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();

    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }

    /*Ouverture vueMesTemplates*/
    include('../vues/vueMesTemplates.php');
 ?>
