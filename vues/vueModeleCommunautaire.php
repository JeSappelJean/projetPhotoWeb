<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php require_once('../model/DAO.class.php'); ?>

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
                  if(isset($_GET['theme'])) {
                    $selected = $_GET['theme'] ;
                  } else {
                    $selected = 'liste';
                  }
                  $selectedValue = 'selected="selected"';
                ?>

                <form method="get">
                  <h2>Thème:</h2>
                  <select name="theme" type="text" size="1">
                    <option disabled value='lsite' <?php if ($selected == "liste") echo $selectedValue ?>>Liste des thèmes</option>
                    <option value="ete" <?php if ($selected == "ete") echo $selectedValue ?>>Ete</option>
                    <option value="automne"<?php if ($selected == "automne") echo $selectedValue ?>>Automne</option>
                    <option value="hiver"<?php if ($selected == "hiver") echo $selectedValue ?>>Hiver</option>
                    <option value="printemps"<?php if ($selected == "printemps") echo $selectedValue ?>>Printemps</option>

                     <a href="../controleur/afficherVueModeleCommunautaire.ctrl.php" title="Search"><input type="submit" value="Rechercher"></a>
                  </select>
                </form>
              </div>

              <div id="column_down">
                <h2>Aperçu: </h2>
                <div id="repTemplate">
                  <div id="repTemplateG">
                    <?php
                      if(isset($_GET['id'])) {
                        $templatenum = $dao->getTemplate($_GET['id']);
                        $selected = $templatenum[0]->theme;
                      } else {
                        $selected = "vide";
                      }
                      print '<img src="../data/imagesSite/im'.$selected.'.jpg" alt="template actuel" width=200px height=200px>';
                    ?>
                  </div>
                  <div id="repTemplateD">
                    <?php
                      if(isset($_GET['id'])){
                        $themeUse = $templatenum[0]->theme;
                        $nbpagesUse = $templatenum[0]->nbpages;
                        $auteur = $templatenum[0]->login;
                        echo '<p><b>Thème : </b>'.$themeUse.'</p>';
                        echo '<p><b>Nombre de pages : </b>'.$nbpagesUse.'</p>';
                        echo '<p><b>Auteur : </b>'.$auteur.'</p>';
                      }
                    ?>
                  </div>
                </div>
                <div id="boutonsContainer">
                  <b>
                    <!--<a id="boutonEdit" href="../controleur/afficherVueCreationTemplate.ctrl.php">Editer</a>-->
                    <a id="boutonUse" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce Modèle</a>
                  </b>
                </div>
              </div>
            </div>

            <div id="column_right">
              <?php
              if(isset($_GET['theme'])) {
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



              $liste = $dao->getTemplateWTheme($_GET['theme']) ;
                foreach ($liste as $v) {
                  print '<div id="template">';
                  print '<a href="../controleur/afficherVueModeleCommunautaire.ctrl.php?theme='.$theme.'&id='.$v->num.'"><img src ="'.$image.'" alt="$theme" width ="150" height="150"/></a>';
                  print'<p><b>'.$v->theme.'</b></p>';
                  print'</div>';
                }
              }
              ?>

            </div>
        </div>
      </footer>
    </body>

</html>
