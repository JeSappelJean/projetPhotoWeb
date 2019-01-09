<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    include_once('../model/DAO.class.php');
    $BDD = new DAO();
    var_dump($_POST['theme']);
    var_dump($_SESSION['login']);

    $BDD->createTemplateVide($_POST['num'],$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],false,false);
    $template = $BDD->getInfoTemplate($_POST['num']);
    var_dump($template[0]->nbpages);
    $template = $BDD->getInfoTemplate($_POST['num']);
    var_dump($template[0]->nbpages);
    $GLOBALS['resultatCréation']='Template créé avec succes';
    /*$GLOBALS['templateModifiable']=$dao->getTemplate(4);*/
    include('../vues/vueFinalisation.php');
?>
