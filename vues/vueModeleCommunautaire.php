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

<!--Affichage de la barre de navigation ("Mes modèles","Modèles communautaires" et "Thème du mois (Concours)")-->
        <div id="navigueBar">
            <a id="MesModeles" href="../controleur/afficherVueMesTemplates.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">
              <!--Affichage de la sélection du thèmme voulu-->
              <div id="column_up">
                <!-- barre de recherche -->
                <?php
                //Permet de vérifier si l'utilisateur a sélectionné un template ou non
                  if(isset($_GET['theme'])) {
                    $selected = $_GET['theme'] ;
                  } else {
                    $selected = 'liste';
                  }
                  $selectedValue = 'selected="selected"';
                ?>
                <!--Création d'un formulaire pour sélectionner le thème voulu-->
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

              <!--Affichage de la visualisation d'un template-->
              <div id="column_down">
                <h2>Aperçu: </h2>
                <div id="repTemplate">
                  <div id="repTemplateG">
                    <?php
                    //Vérification que l'utilisateur a sélectionné un template
                      if(isset($_GET['id']) && isset($_GET['nump'])) {
                        $templatenum = $dao->getTemplate($_GET['id']);
                        $selected = $templatenum[0]->theme;
                        $nump = $_GET['nump'];
                      } else {
                        $selected = "vide";
                        $nump = "";
                      }
                      print '<img src="../data/imagesSite/im'.$selected.''.$nump.'.jpg" alt="template actuel" width=200px height=200px>';
                    ?>
                  </div>
                  <div id="repTemplateD">
                    <?php
                    //Récupération des informations d'un template si l'utilisateur en a sélectionné un
                      if(isset($_GET['id'])){
                        $themeUse = $templatenum[0]->theme;
                        $nbpagesUse = $templatenum[0]->nbpages;
                        $auteur = $templatenum[0]->login;
                        $nblike = $dao->getNbLike($_GET['id']);
                        echo '<p><b>Thème : </b>'.$themeUse.'</p>';
                        echo '<p><b>Nombre de pages : </b>'.$nbpagesUse.'</p>';
                        echo '<p><b>Auteur : </b>'.$auteur.'</p>';
                        echo '<p><b>Like : </b>'.$nblike.'</p>';
                      }
                    ?>
                    </div>
                      <b>
                        <?php
                          if (isset($_GET['id'])){
                            echo '<a id="boutonUse" href="../controleur/traitementLivreAvecTemplate.ctrl.php?id='.$_GET['id'].'">Utiliser ce modèle</a>';
                          }
                        ?>
                      </b>
                  </div>
                  </div>
            </div>
            <!--Affichage des différents template en fonction du thème choisi-->
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
                $i = 0;
                foreach ($liste as $v) {
                  print '<div id="template">';
                  print '<a href="../controleur/afficherVueModeleCommunautaire.ctrl.php?theme='.$theme.'&id='.$v->num.'&nump='.$i.'"><img src ="../data/imagesSite/im'.$v->theme.''.$i.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                  print'<p><b>'.$v->theme.'</b></p>';
                  print'</div>';
                  if($i<9) {
                    $i = $i + 1;
                  }
                }
              }
              ?>

            </div>
        </div>

    </body>

</html>
