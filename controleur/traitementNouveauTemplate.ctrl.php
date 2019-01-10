<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    require_once('../model/DAO.class.php');
    $BDD = new DAO();
    $num = $BDD->getNbTemplate() + 1;

    if(isset($_POST['public'])){
      $public = ($_POST['public']=='public');
    } else {
      $public = false;
    }
    var_dump($_POST['nbpages']);
    $BDD->createTemplateVide(($num),$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],$public,false);
    $template = $BDD->getInfoTemplate($num);

    $GLOBALS['resultatCréation']='Template créé avec succes';
    /*$GLOBALS['templateModifiable']=$dao->getTemplate(4);*/
    include('../vues/vueFinalisation.php');
?>
