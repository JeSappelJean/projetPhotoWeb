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
              <div id="titreNosTemplate">
                <h2> Nos Templates De la Saison : </h2></br>
              </div>
              <div id="NosTemplate">
                  <?php
                    $liste = $dao->getTemplateSaison();
                    foreach ($liste as $v) {
                    $alea = rand(0,9);
                      print '<div id="template">';
                      print '<a href="../controleur/afficherAccueil.ctrl.php?theme='.$v->theme.'&id='.$v->num.'"><img src ="../data/imagesSite/im'.$v->theme.''.$alea.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                      print'<p><b>'.$v->theme.'</b></p>';
                      print'</div>';
                    }
                    if(isset($_GET['id'])) {
                      $templatenum = $dao->getTemplate($_GET['id']);
                    }
                  ?>
                </div>
            </div>

            <div id="column_right">
              <h3>Modèle Selectionné :</h3>
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
                  <?php
                    if(isset($_GET['theme'])) {
                      echo '<a id="useButtonModel" href="../controleur/traitementLivreAvecTemplate.ctrl.php?id='.$_GET['id'].'">Utiliser ce modèle</a>';
                    }

                  ?>
                </b>
              </p>
            </div>
        </div>

      </footer>
    </body>

</html>
