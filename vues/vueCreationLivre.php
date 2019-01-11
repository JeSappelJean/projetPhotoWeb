<!DOCTYPE html>
<!--On récupère les fonctions à utilisés-->
<?php require_once('../model/DAO.class.php'); ?>

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


      <!-- Affichage du container principal-->
        <div id="container">
          <!-- Mise en place du colonne à gauche-->
            <div id="column_left">
              <b> Représentation Livre : (Temporaire)</b>

                <div>
                <fieldset>


                      <?php
                     //On vérifie que l'id est bien set et on le récupère
                        if(isset($_GET['id']) ) {
                          echo '<form action="../controleur/traitementNouveauLivreAvecTemplate.ctrl.php" method="post">';
                          //Affichage des informations du template avec l'id
                          $templatenum = $dao->getTemplate($_GET['id']);
                          $selectedTemplate = $templatenum[0]->theme;
                          $selectedNbpages = $templatenum[0]->nbpages;
                          // Affichage du Theme sélectionné
                          echo '<p>Theme :</p>';
                          echo '<input type="hidden" name="num" value="',$_GET['id'],'">';
                          echo '<input id="choixTheme"  type="text" name="theme" value="'.$selectedTemplate.'" required="required" readonly style="border: none">';
                          // Affichage du nombre de pages sélectionné et possibilité de le changer
                          echo '<p>Nombre de pages :</p>';
                          echo '<input id="choixTheme"  type="text" name="theme" value="'.$selectedNbpages.'" required="required" readonly style="border: none">';
                          echo '<br>';
                          echo '<input type="submit" value="valider">';
                          echo '</form>';
                          echo '</fieldset>';
                          echo '</div>';
                        //Si pas d'id, valeurs mises par défaut pouvant être modifiées
                        } else {
                          echo '<form action="../controleur/traitementNouveauLivre.ctrl.php" method="post">';
                          //Affichage du theme selectionné
                          echo '<p>Theme :</p>';
                          echo '<input id="choixTheme"  type="text" name="theme" value="Vide" required="required" readonly style="border: none">';
                          //Affichage du nombre de pages et possibilité de changer
                          echo '<p>Nombre de pages :</p>';
                          echo '<input type="number" name="nbpages" required>';
                          //Checkbox concernant le partage du template ou non
                          echo '<p>Partager le template à la communauté : </p>';
                          echo '<input type="checkbox" name="public" value="public">';
                          //bouton valider qui confirme les infos rentrées
                        echo '<br>';
                        echo '<input type="submit" value="valider">';
                    echo '</form>';
                echo '</fieldset>';
                echo '</div>';

            echo '</div>';
            //Mise en place d'une colonne à droite
            echo '<div id="column_right">';
              echo '<p> <b>Choisissez le thème de votre Livre : </b></p>';
              echo '<p>';
              // Affichage des thèmes disponible qui, si cliquer dessus, change la valeur de Thème créé plus haut
                echo '<b id = "theme">';
                  echo '<input style="margin-left:22px;" id="boutonSaisonsH" type="button" value="Hiver" name = "Hiver"/>';
                  echo '<input style="margin-left:22px;" id="boutonSaisonsA" type="button" value="Automne"/>';
                  echo '<input style="margin-left:22px;" id="boutonSaisonsP" type="button" value="Printemps"/>';
                  echo '<input style="margin-left:22px;" id="boutonSaisonsE" type="button" value="Ete"/>';
                echo '</b>';
              echo '</p>';

            echo '</div>';

            }
          ?>
        </div>


      <script>
        <?php
          if(!isset($_SESSION['login'])){
            echo "alert(\"Pour créer un livre vous devez d'abord vous connecter !\");";
            echo "window.location = '../controleur/controleurAccueil.php';";
          }
         ?>
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
