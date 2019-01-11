<!--Traitement pour la création d'un nouveau template-->
<?php
    /*Permet de garder la connexion utilisateur active*/
    session_start();

    /*Récupération de la class DAO*/
    require_once('../model/DAO.class.php');

    $BDD = new DAO();
    $num = $BDD->getNbTemplate() + 1;

    /*Permet de voir si le template est public ou non*/
    if(isset($_POST['public'])){
      $public = ($_POST['public']=='public');
    } else {
      $public = false;
    }

    /*Permet de savoir si le template participe au concours*/
    if(isset($_POST['concours'])){
      $concours = ($_POST['concours']=='concours');
    } else {
      $concours = false;
    }

    /*On va créer le template puis récupérer ses informations*/
    $BDD->createTemplate(($num),$_SESSION['login'],$_POST['theme'],$_POST['nbpages'],$public,$concours);
    $template = $BDD->getInfoTemplate($num);

    $GLOBALS['resultatCréation']='Template créé avec succes';

    /*Affichage vueFinalisation*/
    include('../vues/vueFinalisation.php');
?>
