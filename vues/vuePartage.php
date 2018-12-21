<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/stylePagePartage.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <!--Affichage Image (Template par la suite)-->
      <footer>

        <nav>
          <img src="../data/imagesSite/photoImageTest.jpg" alt="ImageTestPartage">
        </nav>

        <nav>
          <input type="button" value="Partage">
          <input type="button" value="Sauvegarde">
        </nav>

      </footer>



    </body>

</html>
