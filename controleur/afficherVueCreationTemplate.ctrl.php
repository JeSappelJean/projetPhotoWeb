<?php
    include_once('../model/DAO.class.php');
    $GLOBALS['templateModifiable']= $dao->createTemplateVide();
    include('../vues/vueCreationTemplate.php');
 ?>
