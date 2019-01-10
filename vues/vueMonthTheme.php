<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueMonthTheme.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>



        <div id="navigueBar">
            <a id="MesModeles" href="../controleur/afficherVueMesTemplates.ctrl.php"><b>Mes Modèles</b></a>
            <a id="ModeleComm" href="../controleur/afficherVueModeleCommunautaire.ctrl.php"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme"><b>Thème du mois (Concours)</b></a>
        </div>

        <div id="container">

            <div id="column_left">

              <div id="column_up">

              </div>

              <div id="column_down">
                <p style="font-size:150%;"><b>Aperçu : </b></p>
                <div id="repTemplate">
                  <?php
                  if(isset($_GET['id'])) {
                    $templatenum = $dao->getTemplate($_GET['id']);
                    $selected = $templatenum[0]->theme;
                  } else {
                    $selected = "vide";
                  }
                  print '<img src="../data/imagesSite/im'.$selected.'.jpg" alt="template actuel" width=100px height=100px>';
                  if (isset($_GET['id'])) {
                    echo "<input id=\"likeBtn\" type=\"image\" src=\"../data/imagesSite/like.png\" onclick=\"like()\">";
                    echo "<input id=\"nbLike\" type=\"text\" name=\"nbLike\" value=\"0\" readonly >";
                  }

                  ?>

                </div>

                <div>
                  <b>
                    <a id="boutonEdit" href="../controleur/afficherVueCreationTemplate.ctrl.php">Voir les détails</a>
                    <a id="boutonUse" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce Modèle</a>
                  </b>
                </div>
              </div>
            </div>

            <div id="column_right">
              <?php
              $templates_concours = $dao->getTemplatesConcours();

              foreach ($templates_concours as $value) {
                      print '<div id="template">';
                      print '<a href="../controleur/afficherVueMonthTheme.ctrl.php?id='.$value->num.'"><img src ="../data/imagesSite/im'.$value->theme.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                      print'<p>'.$value->theme.'</p>';
                      print'</div>';
                  }
               ?>
            </div>
        </div>

        <script type="text/javascript">
          function like() {
            <?php
            if(isset($_POST['login'])){

            } ?>
            document.getElementById("nbLike").value++;
          }

        </script>



              <footer>

      </footer>
    </body>

</html>
