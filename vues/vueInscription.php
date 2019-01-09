<!DOCTYPE html>
<html lang=fr dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>PhotoWeb (Test Site)</title>
    <link rel="stylesheet" type="text/css" href="../vues/styleVueInscription.css">

    <!--Affichage petit icône en haut de page-->
    <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

  </head>

  <body>

    <form class="" action="../controleur/controleurInscription.php" method="post">
        <div class="item">
          <h2>E-mail :</h2>
          <input type="text" name="login" placeholder="E-mail" required>
        </div>
        <div class="item">
          <h2>Mot de passe :</h2>
          <input type="password" name="mdp" placeholder="Mot de passe" required>
        </div>
        <div class="item">
          <h2>Confirmation mot de passe :</h2>
          <input type="password" name="mdpConfirm" placeholder="Confirmation" required>
        </div>
        <input id="connexion" class="connexion" type="submit" name="connexion" value="Inscription">
    </form>

  </body>
</html>
