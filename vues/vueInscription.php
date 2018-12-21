<!DOCTYPE html>
<html lang=fr dir="ltr">
  <head>
    <link rel="stylesheet" href="Inscription.vue.css">
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <form class="" action="../controleur/controleurInscription.php" method="post">


<div class="item">
<div class="item">
      <p>E-mail :</p>
      <input type="text" name="login" placeholder="login" required>
</div>
<div class="item">
      <p>Mot de passe :</p>
      <input type="password" name="mdp" placeholder="Mot de passe" required>
</div>
<div class="item">
      <p>Confirmation mot de passe :</p>
      <input type="password" name="mdpConfirm" placeholder="Confirmation" required>
</div>
      <input class="connexion" type="submit" name="connexion" value="Inscription">
    </form>

  </body>
</html>
