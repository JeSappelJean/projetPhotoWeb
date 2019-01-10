<!--Traitement pour la création d'un nouveau template-->
<?php
    session_start();
    include_once('../model/DAO.class.php');
    $BDD = new DAO();

    $num2 = $BDD->getNbLivre() + 1;
<<<<<<< HEAD
    $BDD->createLivreVide($num2,$_SESSION['login'],$_POST['num']);
    $template = $BDD->getInfoTemplate($_POST['num']);

=======
    $BDD->createLivreVide(($num2),$_SESSION['login'],($num2));
>>>>>>> 18df45451eea51e5da639143fc9f98c152f80b86

    include('../vues/vueFinalisation.php');
?>
