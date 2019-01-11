<!--Traitement pour la création d'un nouveau template-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();

    /*On récupère la class DAO*/
    include_once('../model/DAO.class.php');

    $BDD = new DAO();

    /*On récupère le nombre de templates*/
    $num1 = $BDD->getNbTemplate() + 1;

    /*On récupère le nombre de Livre*/
    $num2 = $BDD->getNbLivre() + 1;

    /*Le template est il public ou non (partie communautaire)*/
    if(isset($_POST['public'])){
      $public = ($_POST['public']=='public');
    } else {
      $public = false;
    }

    /*Permet de creer un template et de récupérer ses informations*/
    $BDD->createTemplate(($num1),$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],$public,false);
    $template = $BDD->getInfoTemplate($num1);
    $GLOBALS['resultatCréation']='Template créé avec succes';

    /*Permet de creer un template et de récupérer ses informations*/
    $BDD->createLivre(($num2),$_SESSION['login'],($num1));
    $template = $BDD->getInfoTemplate($num1);

    /*Affichage vueFinalisatione*/
    include('../vues/vueFinalisation.php');
?>
