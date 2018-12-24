<!DOCTYPE html>
<html lang=fr dir="ltr">
  <head>
    <link rel="stylesheet" href="connexion.vue.css">
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>
        <form class="" action="../controleur/controleurConnexion.php" method="post">
      <p>E-mail</p>
      <input type="text" name="login" placeholder="E-mail" >
      <p>Mot de passe</p>
      <input type="password" name="mdp" placeholder="Mot de passe" required>
      <input class="connexion" type="submit" name="connexion" value="Connexion">
    </form>


  </body>
</html>
