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
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <footer>
        <p>Bientôt ici le résultat de votre sauvegarde (bien Sauvegardé | mal Sauvegardé)</p>
        <nav>
          <a href="../controleur/afficherVueCommunaute.ctrl.php" title="Continuer"><input type="button" value="Continuer"></a>
        </nav>
      </footer>
    </body>

</html>
