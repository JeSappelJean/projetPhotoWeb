<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php require_once('../model/DAO.class.php');?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>PhotoWeb (Test Site)</title>
        <link rel="stylesheet" type="text/css" href="../vues/styleVueMesTemplates.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imagesSite/favicon.ico"/>

    </head>

    <body>
      <!--Affichage du bandeau du site-->
      <?php include_once('../vues/vueBandeauSite.php') ?>
      <!--Affichage de la barre de navigation ("Mes modèles","Modèles communautaires" et "Thème du mois (Concours)")-->
        <div id="navigueBar">
            <a id="MesModeles"><b>Mes Modèles</b></a>
            <a id="ModeleComm"href="../controleur/afficherVueModeleCommunautaire.ctrl.php"><b>Modèles Communautaires</b></a>
            <a id="MonthTheme" href="../controleur/afficherVueMonthTheme.ctrl.php"><b>Thème du mois (Concours)</b></a>
        </div>
        <!--Affichage de la partie visualisation du template-->
        <div id="container">
            <div id="column_left">
              <p style="font-size:150%;"><b>Aperçu : </b></p>
              <div id="repTemplate">
                <?php
                //Regarde si l'utilisateur a sélectionné un template
                if(isset($_GET['id'])) {
                  $templatenum = $dao->getTemplate($_GET['id']);
                  $selected = $templatenum[0]->theme;
                } else {
                  $selected = "vide";
                }
                print '<img src="../data/imagesSite/im'.$selected.'.jpg" alt="template actuel" width=250px height=250px>';
                ?>
              </div>

              <div>
                <b>
                  <?php
                  //Regarde si l'utilisateur a sélectionné un template pour afficher les boutons de modifications,supression ou d'utilisation du template
                    if(isset($_GET['id'])) {
                      $id = $_GET['id'];
                    } else {
                      $id = NULL;
                    }
                    if ($id != NULL){
                      print '<a id="boutonEdit" href="../controleur/afficherVueCreationTemplate.ctrl.php?id='.$id.'"><b>Editer ce Modèle</b></a>';/*Non fonctionnel*/
                      print '<a id="boutonSupprimer" href="../controleur/supprimerTemplate.php?id='.$id.'"><b>Supprimer ce Modèle</b></a>';
                      print '<a id="boutonUse" href="../controleur/traitementLivreAvecTemplate.ctrl.php?id='.$_GET['id'].'">Utiliser ce modèle</a>';
                    }
                  ?>

                </b>
              </div>
            </div>
            <!--Affichage de la partie de sélection des tempaltes-->
            <div id="column_right">
                  <?php
                  if (isset($_SESSION['login'])){
                    $templates = $dao->getTemplateLogin($_SESSION['login']);
                    foreach ($templates as $value) {
                            print '<div id="template">';
                            if($value->theme == "Vide"){
                              print '<a href="../controleur/afficherVueMesTemplates.ctrl.php?id='.$value->num.'"><img src ="../data/imagesSite/im'.$value->theme.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                            } else {
                              print '<a href="../controleur/afficherVueMesTemplates.ctrl.php?id='.$value->num.'"><img src ="../data/imagesSite/im'.$value->theme.'0.jpg" alt="$theme" width ="150" height="150"/></a>';
                            }
                            print'<p><b>'.$value->theme.'</b></p>';
                            print'</div>';
                        }
                  }

                   ?>
            </div>
        </div>

      <script>
      <?php
      //Vérification que l'utilisateur est bien connecté
      if(!isset($_SESSION['login'])){
        echo "alert(\"Pour consulter vos templates vous devez d'abord vous connecter !\");";
        echo "window.location = '../controleur/controleurAccueil.php';";
      }
       ?>
      </script>

    </body>

</html>
