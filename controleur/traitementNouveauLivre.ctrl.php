<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    include_once('../model/DAO.class.php');
    $BDD = new DAO();


    $num1 = $BDD->getNbTemplate() + 1;
    if(isset($_POST['public'])){
      $public = ($_POST['public']=='public');
    } else {
      $public = false;
    }
    $BDD->createTemplateVide(($num1),$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],$public,false);
    $template = $BDD->getInfoTemplate($num1);
    $GLOBALS['resultatCréation']='Template créé avec succes';


    $num2 = $BDD->getNbLivre() + 1;
    $BDD->createLivreVide(($num2),$_SESSION['login'],($num1));
    $livre = $BDD->getInfoLivre($num2);
    $GLOBALS['resultatCréationLivre']='Livre créé avec succes';


    include('../vues/vueFinalisation.php');
?>
