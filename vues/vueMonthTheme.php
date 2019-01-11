<!DOCTYPE html>

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

                    <?php
                      $templates_concours = $dao->getTemplatesConcours();
                      $nbLike = 0;
                      $numtp = 0;
                      $i = 0;
                      foreach ($templates_concours as $value)
                       {
                        if  ($dao->getNbLike($value->num) > $nbLike) {
                              $nbLike = $dao->getNbLike($value->num);
                              $numtp = $value->num;
                              $i++;
                        }
                        }
                        $i = $i - 1;

                      if ($numtp > 0) {
                      $template = $dao->getTemplate($numtp);
                      echo '<div id="templateAff">';
                      print '<a href="../controleur/afficherVueMonthTheme.ctrl.php?id='.$numtp.'&i='.$i.'"><img src ="../data/imagesSite/im'.$template[0]->theme.''.$i.'.jpg" alt="plusliké" width =200px height=200px/></a>';
                      } else {
                      print '<img src="../data/imagesSite/imVide.jpg" alt="vide" width=100px height=100px>';
                      }
                      echo'</div>';

                      echo'<div id="templateTxt">';
                      echo'<p id="nblike"><b>Template le plus liké avec un total de '.$nbLike.' like!<br></b></p>';
                      echo'</div>';
                    ?>
                  </div>

                    <div id="column_down">
                      <p id ="apercu" style="font-size:150%;"><b>Aperçu : </b></p>
                      <div id="repTemplate">
                        <div id="repTemplateG">
                        <?php
                        if(isset($_GET['id']) && isset($_GET['i'])) {
                          $templatenum = $dao->getTemplate($_GET['id']);
                          $selected = $templatenum[0]->theme;
                          $nbtemp = $_GET['i'];
                        } else {
                          $selected = "vide";
                          $nbtemp = "";
                        }
                        print '<img src="../data/imagesSite/im'.$selected.''.$nbtemp.'.jpg" alt="template actuel" width=200px height=200px>';
                        ?>
                        </div>
                        <div id="repTemplateD">
                          <?php
                            if(isset($_GET['id'])){
                              $templatenum = $dao->getTemplate($_GET['id']);
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
                        <div>
                          <b>
                            <a id="boutonUse" href="../controleur/afficherVueCreationLivre.ctrl.php">Utiliser ce Modèle</a>
                          </b>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="column_right">
                    <?php
                    $templates_concours = $dao->getTemplatesConcours();
                    $i = 0;
                    foreach ($templates_concours as $value) {
                            print '<div id="template">';
                            print '<a href="../controleur/afficherVueMonthTheme.ctrl.php?id='.$value->num.'&i='.$i.'"><img src ="../data/imagesSite/im'.$value->theme.''.$i.'.jpg" alt="$theme" width ="150" height="150"/></a>';
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
// Fonction permettant d'utiliser GET à la manière du php (source : https://www.creativejuiz.fr/blog/javascript/recuperer-parametres-get-url-javascript)
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

//Détection du click sur le bouton like
$(document).ready(function(){
  $("#likeBtn").click(function(e){
    $.post(
      '../controleur/controleurLike.php',
      {
        id : $_GET('id')
      },
      function(data){
        //L'utilisateur like
        if(data == 'Like'){
         document.getElementById("nbLike").value++;
         $("#resultat").html("<style> #likeBtn { filter: hue-rotate(180deg); -webkit-filter: hue-rotate(180deg); }</style>");
       }
       //L'utilisateur dislike
       else{
         document.getElementById("nbLike").value--;
         $("#resultat").empty();
       }
     },
     'text'
   );
 });
});

//S'active à chaque chargement de la page pour actualiser la couleur jaune du bouton si celui est liké
$(document).ready(function(){
      $.post(
      '../controleur/userLiked.php',
      {
        id : $_GET('id')
      },
      function(data){
        //Le bouton s'affichera en jaune car l'utilisateur a liké
        if(data == 'alreadyLike'){
         $("#resultat").html("<style> #likeBtn { filter: hue-rotate(180deg); -webkit-filter: hue-rotate(180deg); }</style>");
       }
     },
     'text'
   );
});
</script>
