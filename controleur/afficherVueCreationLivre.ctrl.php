<!--Affichage de la vue vueCreationLivre-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();
    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }
    include('../vues/vueCreationLivre.php');
 ?>
