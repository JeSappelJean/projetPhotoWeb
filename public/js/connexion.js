$(document).ready(fonction(){
    $("#connexion").click(function{
        $.post(
          '../controleur/controleurConnexion.php'
          {
            login : $("login").val(), mdp : $("mdp").val()
          },

          function(data){
            if(data == 'ConnexionOk'){
              $("#connexionFini").html("<p>Connexion réussie </p>")
            } else {
              $("#connexionFini").html("<p>Echec de la connexion</p>")
            }
          },

        );
    });
});
