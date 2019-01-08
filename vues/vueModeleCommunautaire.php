<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueModeleCommunautaire.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <footer>
        <div id="navigueBar">
            <a id="MesModeles" href="../controleur/afficherVueMesTemplates.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">

              <div id="column_up">
                <!-- barre de recherche -->

                <?php
                $selected = $_GET['theme'] ;
                $selectedValue = 'selected="selected"';
                ?>

                <form method="get">
                  Recherche:
                  <input type="text" name="recherche" value="hiver.."><br>
                  Thème:
                  <select name="theme" type="text" size="1">
                    <option value="ete" <?php if ($selected == "ete") echo $selectedValue ?>>ete</option>
                    <option value="automne"<?php if ($selected == "automne") echo $selectedValue ?>>automne</option>
                    <option value="hiver"<?php if ($selected == "hiver") echo $selectedValue ?>>hiver</option>
                    <option value="printemps"<?php if ($selected == "printemps") echo $selectedValue ?>>printemps</option>
                    <option value="afaire">...(a generer en php)</option>

                    <?php
                      if(isset($_POST['theme'])) {
                        $theme = ($_POST['theme']);
                      } else {
                        $theme = "ete";
                      }
                     ?>

                     <a href="../controleur/afficherVueModeleCommunautaire.ctrl.php" title="Search"><input type="submit" value="Rechercher"></a>
                  </select>
                </form>
                <!--Vue Rechercher a faire-->
              </div>

              <div id="column_down">

              </div>
            </div>

            <div id="column_right">
              <?php
              $theme = $_GET['theme'];
              if ($theme == "ete") {
                $image = "../data/imagesSite/imEte.jpg" ;
              } else if ( $theme == "automne") {
                $image = "../data/imagesSite/imAutomne.jpg" ;
              } else if ( $theme == "printemps") {
                $image = "../data/imagesSite/imPrintemps.jpg" ;
              } else if ( $theme == "hiver") {
                $image = "../data/imagesSite/imHiver.jpg" ;
              }



              require_once('../model/DAO.class.php');

              echo"$theme";
              $dao = new DAO();


              $liste = $dao->getTemplateWTheme($_GET['theme']) ;
                foreach ($liste as $v) {
                  print '<img src ="'.$image.'" alt="$theme" width ="50" height="50"/>';
                  echo $v->theme;

                }
              ?>

            </div>
        </div>
      </footer>
    </body>

</html>
