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
            <a id="MesModeles" href="../controleur/afficherVueMesTemplates.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm" href="../controleur/afficherVueModeleCommunautaire.ctrl.php"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">

              <div id="column_up">

              </div>

              <div id="column_down">

              </div>
            </div>

            <div id="column_right">
              <?php
              $templates_concours = $dao->getTemplatesConcours();

              foreach ($templates_concours as $value) {
                      echo '<article>';
                      print '<img src ="../data/imagesSite/im'.$value->theme.'.jpg" alt="$theme" width ="50" height="50"/>';
                      echo $value->theme;
                      echo'</article>';
                  }
               ?>
            </div>
        </div>
      </footer>
    </body>

</html>
