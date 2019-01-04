<!--Traitement pour la création d'un nouveau template-->
<?php
    include_once('../model/DAO.class.php');
    $dao->createTemplateVide($_POST['num'],$_POST['theme'],$_POST['nbpages']);
    $GLOBALS['resultatCréation']='Template créé avec succes';
    /*$GLOBALS['templateModifiable']=$dao->getTemplate(4);*/
    include('../vues/vueCreationTemplate.php');
?>
