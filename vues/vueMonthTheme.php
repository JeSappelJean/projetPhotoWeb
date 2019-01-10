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

        <!DOCTYPE html>

      <!--On récupère les fonctions à utilisés-->
      <?php require_once('../model/DAO.class.php');?>

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
                      <div id="template_up">


                    <?php
                    $templates_concours = $dao->getTemplatesConcours();
                    $nbLike = 0;
                    $numtp = 0;
                    foreach ($templates_concours as $value) {
                      if  ($dao->getNbLike($value->num) > $nbLike) {
                            $nblike = $dao->getNbLike($value->num);
                            $numtp = $value->num;
                      }
                    }

                    if ($numtp > 0) {
                    $template = $dao->getTemplate($numtp);

                    print '<a href="../controleur/afficherVueMonthTheme.ctrl.php?id='.$numtp.'"><img src ="../data/imagesSite/im'.$template[0]->theme.'.jpg" alt="plusliké" width =200px height=200px/></a>';
                  } else {
                    print '<img src="../data/imagesSite/imVide.jpg" alt="vide" width=100px height=100px>';
                  }

                    ?>
                    <p>Template le plus liké!</p>
                    </div>
                  </div>

                    <div id="column_down">
                      <p id ="apercu" style="font-size:150%;"><b>Aperçu : </b></p>
                      <div id="repTemplate">
                        <div id="repTemplateG">
                        <?php
                        if(isset($_GET['id'])) {
                          $templatenum = $dao->getTemplate($_GET['id']);
                          $selected = $templatenum[0]->theme;
                        } else {
                          $selected = "vide";
                        }
                        print '<img src="../data/imagesSite/im'.$selected.'.jpg" alt="template actuel" width=200px height=200px>';
                        ?>
                        </div>
                        <div id="repTemplateD">
                          <?php
                            if(isset($_GET['id'])){
                              $themeUse = $templatenum[0]->theme;
                              $nbpagesUse = $templatenum[0]->nbpages;
                              $auteur = $templatenum[0]->login;
                              echo '<p><b>Thème : </b>'.$themeUse.'</p>';
                              echo '<p><b>Nombre de pages : </b>'.$nbpagesUse.'</p>';
                              echo '<p><b>Auteur : </b>'.$auteur.'</p>';
                            }
                          ?>
                        </div>
                        <?php
                        if (isset($_GET['id'])) {
                          $nbLike = (integer)$dao->getNbLike($_GET['id']);
                          echo "<input id=\"likeBtn\" type=\"image\" src=\"../data/imagesSite/like.png\" >";
                          echo "<input id=\"nbLike\" type=\"text\" name=\"nbLike\" value=\"",$nbLike, "\" readonly >";
                        }
                        ?>

                      </div>

                      <div>
                        <b>
                          <a id="boutonUse" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce Modèle</a>
                        </b>
                      </div>
                    </div>
                  </div>

                  <div id="column_right">
                    <?php
                    $templates_concours = $dao->getTemplatesConcours();
                    $i = 0;
                    foreach ($templates_concours as $value) {
                            print '<div id="template">';
                            print '<a href="../controleur/afficherVueMonthTheme.ctrl.php?id='.$value->num.'"><img src ="../data/imagesSite/im'.$value->theme.''.$i.'.jpg" alt="$theme" width ="150" height="150"/></a>';
                            print'<p>'.$value->theme.'</p>';
                            print'</div>';
                            if($i<9) {
                              $i = $i + 1;
                            }
                        }
                     ?>
                  </div>
              </div>
            </div>


<div id="resultat"></div>



              <footer>

      </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </body>

</html>
<script>
  //document.getElementById ("likeBtn").addEventListener ("click", like, false);

//  function like() {
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace(
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;
	}
	return vars;
}
$(document).ready(function(){
  $("#likeBtn").click(function(e){
//e.preventDefault();
    $.post(
      '../controleur/controleurLike.php', // Un script PHP que l'on va créer juste après
      {
        id : $_GET('id')
      },
      function(data){
        if(data == 'Like'){
         // Le membre est connecté. Ajoutons lui un message dans la page HTML.
         //alert(data);
         document.getElementById("nbLike").value++;
         $("#resultat").html("<style> #likeBtn { filter: hue-rotate(180deg); -webkit-filter: hue-rotate(180deg); }</style>");
       }
       else{
         // Le membre n'a pas été connecté. (data vaut ici "failed")
         //alert(data);
         document.getElementById("nbLike").value--;
         $("#resultat").empty();
       }
     },
     'text'
   );
 });
});

$(document).ready(function(){
      $.post(
      '../controleur/userLiked.php', // Un script PHP que l'on va créer juste après
      {
        id : $_GET('id')
      },
      function(data){
        if(data == 'alreadyLike'){
         // Le membre est connecté. Ajoutons lui un message dans la page HTML.
         $("#resultat").html("<style> #likeBtn { filter: hue-rotate(180deg); -webkit-filter: hue-rotate(180deg); }</style>");
       }
     },
     'text'
   );
});
//}
</script>
