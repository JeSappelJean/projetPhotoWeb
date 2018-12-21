<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/stylePageCompte.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <div class="header">
      <?php include_once('../vues/vueBandeauSite.php') ?>
      </div>

      <div class="page">

        <div class="cote">
          <h2>Mon compte</h2>
            <p>Nom utilisateur
            <a href="#">Mes photos</a>
            <a href="#">Mes créations</a>
            <a href="#">Mes avantages</a>
            <a href="#">Mes commandes</a>
            <a href="#">Parrainage</a>
            <a href="#">Mes informations</a>
            <a href="#">Se déconnecter</a>
            </p>

          </div>

          <div class="milieu">
            <h2>Mon compte</h2>
              <div class="Photos">
                  <h3>Mes Photos</h3>
              </div>
              <div class="Mes avantages">
                  <h3>Mes avantages</h3>
              </div>
              <div class="Mes créations">
                  <h3>Mes créations</h3>
              </div>
              <div class="Parrainage">
                  <h3>Mes parrainages</h3>
              </div>
          </div>
        </div>

    </body>

</html>
