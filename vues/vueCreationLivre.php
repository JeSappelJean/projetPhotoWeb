<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueCreationLivre.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>


      <footer>

        <div id="container">
            <div id="column_left">
              <b> Représentation Livre : (Temporaire)</b>

                <div>
                <fieldset>
                    <form action="../controleur/traitementNouveauTemplate.ctrl.php" method="post">

                        <p>Theme :</p>
                        <input id="choixTheme"  type="text" name="theme" value="Default" required="required" readonly style="border: none">
                        <p>Nombre de pages :</p>
                        <input type="number" name="nbpages" required>
                        <p>Partager le template à la communauté : </p>
                        <input type="checkbox" name="public" value="public">

                        <br>
                        <input type="submit" value="valider">
                    </form>
                </fieldset>
                </div>



            </div>

            <div id="column_right">
              <p> <b>Choisissez le thème de votre Livre : </b></p>
              <p>
                <b id = "theme">
                  <input style="margin-left:22px;" id="boutonSaisonsH" type="button" value="Hiver" name = "Hiver"/>
                  <input style="margin-left:22px;" id="boutonSaisonsA" type="button" value="Automne"/>
                  <input style="margin-left:22px;" id="boutonSaisonsP" type="button" value="Printemps"/>
                  <input style="margin-left:22px;" id="boutonSaisonsE" type="button" value="Ete"/>
                </b>
              </p>

            </div>
        </div>

      </footer>

      <script>
        function creerTemplate(theme){
          var xhr = new XMLHttpRequest();
          xhr.open('GET','../vues/vueCreationTemplate');
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

          xhr.addEventListener('readystatechange',function(){
            //Vérification que l'événement est terminé (DONE) et que la requète à été résalisé avec succès (statut 200)
            //Affichage du theme
              if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                document.getElementById('choixTheme').value = theme ;
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
