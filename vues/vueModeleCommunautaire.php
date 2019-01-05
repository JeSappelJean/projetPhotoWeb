<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueModeleCommunautaire.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>

      <footer>
        <div id="navigueBar">
            <a id="MesModeles" href="../controleur/afficherVueMesTemplates.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">

              <div id="column_up">
                <!-- barre de recherche -->
                <form>
                  Recherche:
                  <input type="text" name="recherche" value="hiver.."><br>
                  Thème:
                  <select name="theme" type="text" size="1">
                    <option value="ete" selected="selected">ete</option>
                    <option value="automne">automne</option>
                    <option value="hiver">hiver</option>
                    <option value="printemps">printemps</option>
                    <option value="printemps">hiver</option>
                    <option value="printemps">...(a generer en php)</option>
                  </select>
                </form>
                <a href="#" title="Search"><input type="button" value="Rechercher"></a><!--Vue Rechercher a faire-->
              </div>

              <div id="column_down">

              </div>
            </div>
            
            <div id="column_right">
            </div>
        </div>
      </footer>
    </body>

</html>
