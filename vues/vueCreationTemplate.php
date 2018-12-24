<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueCreationTemplate.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>


      <footer>

        <div id="container">
            <div id="column_left"> Représentation Template </div>

            <div id="column_right">
              <p> <b>Choisissez le thème de votre Template : </b></p>
              <p>
                <b>
                  <a id="boutonSaisonsH" href="#">Hiver</a>
                  <a id="boutonSaisonsA" href="#">Automne</a>
                  <a id="boutonSaisonsP" href="#">Printemps</a>
                  <a id="boutonSaisonsE" href="#">Eté</a>
                </b>
              </p>

            </div>
        </div>

      </footer>

      <nav>
        <a href="../controleur/afficherVueFinalisation.ctrl.php" title="Calendrier & Agenda"><input type="button" value="Finaliser"></a>
      </nav>
    </body>

</html>
