<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    include_once('../model/DAO.class.php');
    $BDD = new DAO();

    $num2 = $BDD->getNbLivre() + 1;
    $BDD->createLivreVide(($num2),$_SESSION['login'],($num1));

    include('../vues/vueFinalisation.php');
?>
