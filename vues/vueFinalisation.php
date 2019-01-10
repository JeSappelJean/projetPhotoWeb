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
                  <h3>Votre Template Final :</h3>
                  <p> <b>Thème : <?php echo $template[0]->theme ?></b></p>
                  <p> <b>Créé par : <?php echo $template[0]->login ?> </b></p>
                  <p> <b>Nombres de pages : <?php echo $template[0]->nbpages ?> </b></p>
                </b>
              </p>

            </div>
        </div>

        <nav>
          <a href="../controleur/afficherVueMesTemplates.ctrl.php" title="share"><input type="button" value="Partage"></a>
          <a href="../controleur/afficherAccueil.ctrl.php" title="share"><input type="button" value="Accueil"></a>
        </nav>

      </footer>


    </body>

</html>
