<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php require_once('../model/DAO.class.php'); ?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/stylePageAccueil.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php
        include_once('../vues/vueBandeauSite.php')
      ?>

      <footer>

        <div id="container">
            <div id="column_left">
              <h2> Nos Templates De la Saison : </h2></br>
                  <?php
                    $liste = $dao->getTemplateSaison();
                    foreach ($liste as $v) {
                      if ($v->theme == "ete") {
                        $image = "../data/imagesSite/imEte.jpg" ;
                      } else if ( $v->theme == "automne") {
                        $image = "../data/imagesSite/imAutomne.jpg" ;
                      } else if ( $v->theme == "printemps") {
                        $image = "../data/imagesSite/imPrintemps.jpg" ;
                      } else if ( $v->theme == "hiver") {
                        $image = "../data/imagesSite/imHiver.jpg" ;
                      }
                      print '<div id="template">';
                      print '<a href="../controleur/afficherAccueil.ctrl.php?theme='.$v->theme.'&id='.$v->num.'"><img src ="'.$image.'" alt="$theme" width ="150" height="150"/></a>';
                      print'<p><b>'.$v->theme.'</b></p>';
                      print'</div>';
                    }

                    if(isset($_GET['id'])) {
                      $templatenum = $dao->getTemplate($_GET['id']);
                      $selected = $templatenum[0]->theme;
                    } else {
                      $selected = "vide";
                    }
                  ?>
            </div>

            <div id="column_right">
              <h3>Modèle du jour :</h3>
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
              <p>
                <b>
                  <a id="useButtonModel" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce modèle</a>
                </b>
              </p>
            </div>
        </div>

      </footer>
    </body>

</html>
