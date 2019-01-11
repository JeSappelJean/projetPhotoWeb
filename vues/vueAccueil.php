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


        <!--Création de la division globale-->
        <div id="container">
          <!--Création de la division contenant les templates de la saison-->
            <div id="column_left">
              <!--Titre de la division-->
              <div id="titreNosTemplate">
                <h2> Nos Templates De la Saison : </h2></br>
              </div>
              <!--Affichage de tout les template du thème actuel-->
              <div id="NosTemplate">
                  <?php
                    $i=0;
                    //Création d'une liste qui contient tout les templates de la saison
                    $liste = $dao->getTemplateSaison();
                    foreach ($liste as $v) {
                      print '<div id="template">';
                      //Affichage du template
                      print '<a href="../controleur/afficherAccueil.ctrl.php?theme='.$v->theme.'&id='.$v->num.'"><img src ="../data/imagesSite/im'.$v->theme.''.$i.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                      print'<p><b>'.$v->theme.'</b></p>';
                      print'</div>';
                      //boucle qui permet de changer l'image du template pour les différencier
                      if ($i<9) {
                        $i = $i + 1;
                      }
                    }
                    //Si l'utilisateur a cliqué sur un template, alors on affiche ses caractéristiques
                    if(isset($_GET['id'])) {
                      $templatenum = $dao->getTemplate($_GET['id']);
                    }
                  ?>
                </div>
            </div>
            <!--Création de la division contenant les infos d'un template-->
            <div id="column_right">
              <h3>Modèle Selectionné :</h3>
              <?php
                //Si l'utilisateur a cliqué sur un template, alors on affiche ses caractéristiques
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
                    <!--Si l'utilisateur a sélectionner un template, apparition du bouton pour utiliser ce modèle-->
                  <?php
                    if(isset($_GET['id'])) {
                      echo '<a id="useButtonModel" href="../controleur/traitementLivreAvecTemplate.ctrl.php?id='.$_GET['id'].'">Utiliser ce modèle</a>';
                    }

                  ?>
                </b>
              </p>
            </div>
        </div>

      
    </body>

</html>
