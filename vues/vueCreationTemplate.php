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




        <div id="container">
            <div id="column_left">
              <b> Représentation Template : (Temporaire)</b>

                <div>
                <fieldset>
                    <form action="../controleur/traitementNouveauTemplate.ctrl.php" method="post">

                        <p>Theme :</p>
                        <input id="choixTheme"  type="text" name="theme" value="Vide" required="required" readonly style="border: none">
                        <p>Nombre de pages :</p>
                        <input type="number" name="nbpages" required>
                        <p>Partager le template à la communauté : </p>
                        <input id="public" type="checkbox" name="public" value="public">
                        <p>Proposer son template pour le concours du mois : </p>
                        <input id="concours" type="checkbox" name="concours" value="concours">

                        <br>
                        <input type="submit" value="valider">
                    </form>
                </fieldset>
                </div>



            </div>

            <div id="column_right">
              <p> <b>Choisissez le thème de votre Template : </b></p>
              <p>
                <b id = "theme">
                  <input style="margin-left:22px;" id="boutonSaisonsH" type="button" value="hiver" name = "Hiver"/>
                  <input style="margin-left:22px;" id="boutonSaisonsA" type="button" value="automne"/>
                  <input style="margin-left:22px;" id="boutonSaisonsP" type="button" value="printemps"/>
                  <input style="margin-left:22px;" id="boutonSaisonsE" type="button" value="ete"/>
                </b>
              </p>

            </div>
        </div>

      



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </body>

</html>

<script>
  <?php
  if(!isset($_SESSION['login'])){
    echo "alert(\"Pour créer un template vous devez d'abord vous connecter !\");";
    echo "window.location = '../controleur/controleurAccueil.php';";
  }
   ?>
  function valueTheme(theme){
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
    valueTheme(th.target.value);
  }
  //Excécuter selectTheme quand le page est complètement chargée
  window.addEventListener('load',selectTheme);

  $(function() {
    enable_cb();
    $("#public").click(enable_cb);
    });

    function enable_cb() {
      $("#concours").prop("disabled", !this.checked);
      if(this.checked==false){
        $("#concours").prop("checked", false);
      }
    }

</script>
