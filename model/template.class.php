<?php
//Objet Template
//Paramètres :
//            num : numéro unique du template
//            login : login de l'utilisateur qui a créé le templates
//            theme : theme sélectionné lors de la création du templates
//            nbpages : nombre de pages du templates
//            public : permet de savoir si le template est partagé à la communauté ou none
//            concours : permet de savoir si le template participe au concours du mois
    class Template {
      public $num;
      public $login;
      public $theme;
      public $nbpages;
      public $public;
      public $concours;
    }
?>
