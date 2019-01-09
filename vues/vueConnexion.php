<!DOCTYPE html>
<html lang=fr dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>PhotoWeb (Test Site)</title>
    <link rel="stylesheet" type="text/css" href="../vues/styleVueConnexion.css">

    <!--Affichage petit icône en haut de page-->
    <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

</head>

  <body>
    <div>
      <form class="" action="../controleur/controleurConnexion.php" method="post">
        <h2>E-mail :</h2>
        <input type="text" name="login" placeholder="E-mail" >
        <h2>Mot de passe :</h2>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input id="connexion" class="connexion" type="submit" name="connexion" value="Connexion">
      </form>
    </div>
  </body>
</html>
