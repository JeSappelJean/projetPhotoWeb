<!--Gestion de l'accueil-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }

    /*uilisation de afficherAccueil.ctrl.php pour garder la sessions active*/
    include('../controleur/afficherAccueil.ctrl.php');
 ?>
