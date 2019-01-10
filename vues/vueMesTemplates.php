<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php require_once('../model/DAO.class.php');?>

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
                <?php
                if(isset($_GET['id'])) {
                  $selected = $_GET['id'] ;
                } else {
                  $selected = "vide";
                }
                print '<img src="../data/imagesSite/im'.$selected.'.jpg" alt="template actuel" width=250px height=250px>';
                ?>
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
                  <?php
                  $templates = $dao->getTemplateLogin($_SESSION['login']);

                  foreach ($templates as $value) {
                          print '<div id="template">';
                          print '<a href="../controleur/afficherVueMesTemplates.ctrl.php?id='.$value->theme.'"><img src ="../data/imagesSite/im'.$value->theme.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                          print'<p>'.$value->theme.'</p>';
                          print'</div>';
                      }
                   ?>
                </div>

              </div>
            </div>
        </div>

      </footer>
      <script>
      <?php
      if(!isset($_SESSION['login'])){
        echo "alert(\"Pour créer un template vous devez d'abord vous connecter !\");";
        echo "window.location = '../controleur/controleurAccueil.php';";
      }
       ?>
      </script>
      </script>

    </body>

</html>
