<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    include_once('../model/DAO.class.php');
    $BDD = new DAO();

    $BDD->createTemplateVide($_POST['num'],$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],false,false);
    $template = $BDD->getInfoTemplate($_POST['num']);
    $template = $BDD->getInfoTemplate($_POST['num']);
    $GLOBALS['resultatCréation']='Template créé avec succes';
    /*$GLOBALS['templateModifiable']=$dao->getTemplate(4);*/
    include('../vues/vueFinalisation.php');
?>
