<!--Traitement pour la création d'un nouveau template-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();

    /*Récupération de la class DAO*/
    include_once('../model/DAO.class.php');


    /*Permet de créer un livre et de récupérer ses informations*/
    $BDD = new DAO();
    $num2 = $BDD->getNbLivre() + 1;
    $BDD->createLivre($num2,$_SESSION['login'],$_POST['num']);
    $template = $BDD->getInfoTemplate($_POST['num']);

    /*Affichage de la vueFinalisation*/
    include('../vues/vueFinalisation.php');
?>
