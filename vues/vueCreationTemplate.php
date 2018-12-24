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
      Page à venir Création de template


      <footer>

        <div id="container">
            <div id="column_left"> Représentation Template </div>
            <div id="column_right"> Bouton Modification Template</div>
        </div>

      </footer>

      <nav>
        <a href="../controleur/afficherVueFinalisation.ctrl.php" title="Calendrier & Agenda"><input type="button" value="Finaliser"></a>
      </nav>
    </body>

</html>
