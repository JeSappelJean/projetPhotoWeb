<!--Affichage de la vueFinalisation-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();

    if (isset($_SESSION['login'])){
      $currentLogin = $_SESSION['login'];
    }

    /*On récupère la class DAO*/
    require_once('../model/DAO.class.php');

    $BDD = new DAO();

    /*On récupère la class template*/
    require_once('../model/template.class.php');

    /*Permet récupérer les valeurs d'un template(num,login,theme,nbpages,public,concours) stocké dans $template*/
    $template = $BDD->getInfoTemplate($_POST['num']);

    /*Ouverture vueFinalisation*/
    include('../vues/vueFinalisation.php');
 ?>
