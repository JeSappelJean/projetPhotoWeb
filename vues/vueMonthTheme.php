<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueMonthTheme.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <footer>
        <div id="navigueBar">
            <a id="MesModeles" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm" href="../controleur/afficherVueModeleCommunautaire.ctrl.php"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme"><b>Thème du mois (Concours)</b></a>
        </div>
      </footer>
    </body>

</html>
