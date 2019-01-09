<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueMesTemplates.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>


      <footer>
        <div id="navigueBar">
            <a id="MesModeles"><b>Mes Modèles</b></a>
            <a id="ModeleComm"href="../controleur/afficherVueModeleCommunautaire.ctrl.php"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">
              <p style="font-size:150%;"><b>Aperçu : </b></p>
              <div id="repTemplate">
                <b>Votre Template (à venir)</b>
              </div>

              <div>
                <b>
                  <a id="boutonEdit" href="../controleur/afficherVueCreationTemplate.ctrl.php">Editer ce Modèle</a>
                  <a id="boutonUse" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce Modèle</a>
                </b>
              </div>
            </div>

            <div id="column_right">
              <div>
                <div>
                  <p>Template correspondant thème</p><!--A remplacer php-->
                </div>
                <p>Nom thème</p><!--A remplacer php-->
              </div>
            </div>
        </div>

      </footer>
    </body>

</html>
