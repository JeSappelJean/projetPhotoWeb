<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php /*require_once('../vue/function.vue.php');*/?>

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


      <footer>

        <div id="container">
            <div id="column_left">
              <b> Représentation Template : (Temporaire)</b>

                <div>
                <fieldset>
                    <form action="traitementNouveauTemplate.ctrl.php" method="post">
                        <p>num:</p>
                        <input type="text" name="num" required="required">
                        <p>theme:</p>
                        <p id="choixTheme">Aucun thème choisi</p>
                        <p>nbpages:</p>
                        <input type="text" name="nbpages" required="required">
                        <input type="submit" value="valider">
                    </form>
                </fieldset>
                </div>
                <?php echo $GLOBALS['resultatCréation']; ?>



            </div>

            <div id="column_right">
              <p> <b>Choisissez le thème de votre Template : </b></p>
              <p>
                <b id = "theme">
                  <input id="boutonSaisonsH" type="button" value="Hiver"/>
                  <input id="boutonSaisonsA" type="button" value="Automne"/>
                  <input id="boutonSaisonsP" type="button" value="Printemps"/>
                  <input id="boutonSaisonsE" type="button" value="Eté"/>
                </b>
              </p>

            </div>
        </div>

      </footer>

      <nav>
        <a href="../controleur/afficherVueFinalisation.ctrl.php" title="finaliser"><input type="button" value="Finaliser"></a>
      </nav>
      <script>
        function creerTemplate(theme){
          var xhr = new XMLHttpRequest();
          xhr.open('GET','http://localhost/PhotoShare/vues/vueCreationTemplate.php');
          xhr.addEventListener('readystatechange',function(){
            //Vérification que l'événement est terminé (DONE) et que la requète à été résalisé avec succès (statut 200)
            //Affichage du theme
              if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                document.getElementById('choixTheme').innerHTML = theme ;
              }

          });

          xhr.send(null);
        }

        //Attend un clic sur un bouton thème et envoie le theme à la requète XML
        function selectTheme(){
          var tableTheme = document.getElementById('theme');
          var theme = tableTheme.getElementsByTagName("input");
          var nbTheme = theme.length;

          for(var i = 0; i < nbTheme; i++) {
              theme[i].addEventListener('click',eventClick,false);
          }
        }

        function eventClick(th){
          creerTemplate(th.target.value);
        }
        //Excécuter selectTheme quand le page est complètement chargée
        window.addEventListener('load',selectTheme);



      </script>
    </body>

</html>
