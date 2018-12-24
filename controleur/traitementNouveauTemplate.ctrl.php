<?php
    include_once('../model/DAO.class.php');
    $dao->createTemplateVide($_POST['num'],$_POST['theme'],$_POST['nbpages']);
    $GLOBALS['resultatCréation']='Template créé avec succes';
    include('../vues/vueCreationTemplate.php');
?>
