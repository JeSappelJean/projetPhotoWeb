<!--Affichage de la vueModeleCommunautaire-->
<?php
  /*Permet de garder la connexion utilisateur active*/
  session_start();

  if (isset($_SESSION['login'])){
    $currentLogin = $_SESSION['login'];
  }

  /*Ouverture vueModeleCommunautaire*/
  include('../vues/vueModeleCommunautaire.php');
?>
