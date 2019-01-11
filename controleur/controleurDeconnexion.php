<?php
  /*Permet de récupérer la personne connectée puis de la déconnecté*/
  session_start();
  session_destroy();

  /*Affichage vue déconnexion*/
  include("../vues/vueDeconnexionOk.php");
?>
