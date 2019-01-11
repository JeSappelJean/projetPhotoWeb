<?php
  require_once('../model/template.class.php');
  require_once('../model/livre.class.php');
  // Creation de l'unique objet DAO
  $dao = new DAO();

  class DAO{
    private $db;

  //Constructeur de la classe DAO
    function __construct(){
      try{
        $this->db = new PDO('sqlite:../data/photoWeb.db');
      }
      catch(PDOException $e){
        die("erreur de connexion :".$e->getmessage());
      }
    }

 //Permet de savoir si le login existe dans la BD
 //Valeur de retour : login dispo ou non
 //$login : login recherché dans la BD
    function getInfoMembre($login) : bool {
     $sql = "SELECT COUNT(*) AS nbr FROM UTILISATEURS WHERE login='$login'";
     $sth = $this->db->query($sql);
     $dispo = ($sth->fetchColumn()==0)?1:0;

     return $dispo;
   }

  //Permet de récupérer le mot de passe lié à un login
  //Valeur de retour : Object Membre(login,mdp);
  //$login : login recherché dans la BD
    function getLoginMdp($login) : array {
      $sql = "SELECT login,mdp FROM UTILISATEURS WHERE login='$login'";
      $sth = $this->db->query($sql);
      $res = $sth->fetchAll(PDO::FETCH_CLASS,'Membres');


      return $res;
    }

  //Permet d'insérer un nouveau membre dans la BD
  //Valeur de retour : void
  //$login : login du nouvel utilisateur
  //$mdp : mot de passe lié au login
    function insertMembre($login,$mdp) {
      $query=$this->db->prepare('INSERT INTO UTILISATEURS (login, mdp) VALUES (:login,:pass)');
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':pass', $mdp, PDO::PARAM_STR);
      $query->execute();
      $query->CloseCursor();
    }

  //Permet de récupérer le template grâce à sa numéro
  //Valeur de retour : Objet Template
  //$num : num du template recherché
    function getTemplate(int $num): array {
        $req="Select * from template where num=$num;";
        $sth=$this->db->query($req);
        $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
        return $result;
    }
    function getInfoTemplate($num) {
      $req="SELECT login,theme, nbpages from template where num = $num ";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

  //Permet de récupérer le nombre de template présent dans la BD
  //Valeur de retour : nombre de template dans la BD
    function getNbTemplate() {
      $sql = "SELECT COUNT(*) as nbr FROM TEMPLATE";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }
  //Permet de récupérer le nombre de livre présent dans la BD
  //Valeur de retour : nombre de livre dans la BD
    function getNbLivre() {
      $sql = "SELECT COUNT(*) as nbr FROM LIVRE";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }

  //Permet de créer un template dans la BD
  //Valeur de retour : void
  //Paramètres :
  //            num : numéro unique du template
  //            login : login de l'utilisateur qui a créé le templates
  //            theme : theme sélectionné lors de la création du templates
  //            nbpages : nombre de pages du templates
  //            public : permet de savoir si le template est partagé à la communauté ou none
  //            concours : permet de savoir si le template participe au concours du mois
    function createTemplate($num, $login, $theme, $nbpages, $public, $concours){
        $query=$this->db->prepare('INSERT INTO TEMPLATE (num, login, theme, nbpages, public, concours) VALUES (:num, :login, :theme, :nbpages, :public, :concours)');
        $query->bindValue(':num', $num, PDO::PARAM_INT);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':theme', $theme, PDO::PARAM_STR);
        $query->bindValue(':nbpages', $nbpages, PDO::PARAM_INT);
        $query->bindValue(':public', $public, PDO::PARAM_BOOL);
        $query->bindValue(':concours', $concours, PDO::PARAM_BOOL);
        $query->execute();
        $query->CloseCursor();
    }

  //Permet de créer un template dans la BD
  //Valeur de retour : void
  //Paramètres :
  //            num : numéro unique du template
  //            login : login de l'utilisateur qui a créé le templates
  //            template : numéro du template assosié au livre
    function createLivre($num, $login, $template){
        $query=$this->db->prepare('INSERT INTO LIVRE (num, login, template) VALUES (:num, :login, :template)');
        $query->bindValue(':num', $num, PDO::PARAM_INT);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':template', $template, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    }

  //Permet de récupérer le livre grâce à son numéro unique
  //Valeur de retour : Objet Livre
  //$num : num du livre recherché
    function getInfoLivre($num) {
      $req="SELECT login,template from livre where num = $num ";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'livre');
      return $result;
    }

  //Permet de récupérer la liste des livres participant au concours du mois
  //Valeur de retour : List d'Objet Livre
    function getTemplatesConcours(): array {
            $req="SELECT * from template where concours = 1;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
            return $result;
        }

  //Permet de récupérer les template du même thème
  //Valeur de retour : List d'Objet Template
  //$theme : theme des template que l'ont veut récupérer
    function getTemplateWTheme($theme): array {
      $req="SELECT * FROM template WHERE theme = '$theme' AND public = 1;";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

  //Permet de récupérer les template d'un utilisateur
  //Valeur de retour : List d'Objet Template
  //$login : login de l'utilisateur de qui on veut récupérer les template
    function getTemplateLogin($login): array {
      $req="SELECT * FROM template WHERE login = '$login';";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

  //Permet d'ajouter un like avec login et le num du template dans la BD
  //Valeur de retour : void
  //$login : login de l'utilisateur qui appuis sur le boutton like
  //$num : num du template liké
    function addLike($login,$num){
      $query=$this->db->prepare('INSERT INTO LIKETEMP (login, num) VALUES (:login, :num)');
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $ok = $query->execute();
      $query->CloseCursor();

      return $ok;
    }

  //Permet dde supprimer un template de la BD
  //Valeur de retour : void
  //$num : num du template à supprimer
    function delTemplate($num){
      $sql = "DELETE FROM TEMPLATE WHERE num =  :num";
      $query = $this->db->prepare($sql);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $query->execute();
    }

  //Permet de supprimer un like lié à un login et un num de template dans la BD
  //Valeur de retour : void
  //$login : login de l'utilisateur qui appuis sur le boutton like alors qu'il a déjà liké le template
  //$num : num du template ou l'on souhaite retirer son like
    function unLike($login,$num){
      $sql = "DELETE FROM LIKETEMP WHERE login =  :login AND num = :num";
      $query = $this->db->prepare($sql);
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $query->execute();
    }

  //Permet de récupérer le nombre de like d'un template
  //Valeur de retour : nombre de like du template
  //$num : numéro unique lié au template
    function getNbLike($num){

      $sql = "SELECT COUNT(*) AS nbr FROM LIKETEMP WHERE num = $num";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }

  //Permet de savoir si un login a déjà liké un template
  //Valeur de retour : déjà liké ou non
  //$login : login de l'utilisateur qui appuis le bouton like
  //$num : numéro du template liké
    function userLiked($login,$num):bool{
      $sql = "SELECT COUNT(*) AS nbr FROM LIKETEMP WHERE login='$login' AND num = $num";
      $sth = $this->db->query($sql);
      $dispo = ($sth->fetchColumn()==0)?0:1;
      return $dispo;
    }

  //Permet de récupérer la période de l'année afin de changer le thème du concours du mois
  //Valeur de retour : liste d'Objet Template
    function getTemplateSaison() {
      //Récupère le jour de l'année
      $jourActuel=date("z")+1;
      if ($jourActuel < 79) {
        $req="SELECT * FROM template WHERE theme = 'hiver';";
      } else if ( ($jourActuel >= 79) && ($jourActuel < 170) ) {
        $req="SELECT * FROM template WHERE theme = 'printemps';";
      } else if ( ($jourActuel >= 170) && ($jourActuel < 240) ) {
        $req="SELECT * FROM template WHERE theme = 'ete';";
      } else if ( ($jourActuel >= 240) && ($jourActuel < 365) ) {
        $req="SELECT * FROM template WHERE theme = 'automne';";
      }
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

}
?>
