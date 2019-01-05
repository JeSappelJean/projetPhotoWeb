<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

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
        /*echo "<p>" ,$currentLogin, " est actuellement connecté </p>";*/
        include_once('../vues/vueBandeauSite.php') 
      ?>

      <footer>

        <div id="container">
            <div id="column_left">
              <h2> Nos Templates Du Jour : </h2>
                <div>

                </div>
            </div>

            <div id="column_right">
              <h3>Modèle du jour :</h3>
              <p> <b>Thème : </b></p>
              <p> <b>Créé par : </b></p>
              <p> <b>Utilisations : </b></p>
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
