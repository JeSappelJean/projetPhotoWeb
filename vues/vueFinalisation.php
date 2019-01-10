<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueFinalisation.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <!--Affichage Image (Template par la suite)-->
      <footer>

        <div id="container">
            <div id="column_left">
              <b> Représentation Template : (Temporaire)</b>
            </div>

            <div id="column_right">
              <p>
                <b>
                  <?php
                    if (isset($template)) {
                      echo'<h3>Votre Template Final :</h3>';
                      echo'<p> <b>Thème : '.$template[0]->theme.'</b></p>.';
                      echo'<p> <b>Créé par : '.$template[0]->login.'</b></p>';
                      echo'<p> <b>Nombres de pages : '.$template[0]->nbpages .'</b></p>';
                    }
                  ?>
                </b>
              </p>
              <p>
                <b>
                  <?php
                    if (!isset($template)) {
                      echo'<h3>Votre Template Final :</h3>';
                      echo'<p> <b>Thème : '.$livre[0]->theme.'</b></p>.';
                      echo'<p> <b>Créé par : '.$livre[0]->login.'</b></p>';
                    }
                  ?>
                </b>
              </p>

            </div>
        </div>

        <nav>
          <a href="../controleur/afficherVueMesTemplates.ctrl.php" title="share"><input type="button" value="Partage"></a>
          <a href="../controleur/afficherAccueil.ctrl.php" title="Home"><input type="button" value="Accueil"></a>
        </nav>

      </footer>


    </body>

</html>
