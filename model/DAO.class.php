<?php
/* pour recreer la base executer ces commandes une par une apres avoir ouvert la base sqlite (commande shell: sqlite3 photoWeb.db)

.read create.sql
.separator |
.import template.txt template
.+ autres ( ce que vous rajouter)*/

  require_once('../model/template.class.php');
  require_once('../model/livre.class.php');
  // Creation de l'unique objet DAO
  $dao = new DAO();

  class DAO{
    private $db;

    function __construct(){
      try{
        $this->db = new PDO('sqlite:../data/photoWeb.db');
      }
      catch(PDOException $e){
        die("erreur de connexion :".$e->getmessage());
      }
    }

    function getInfoMembre($login) : bool {
     $sql = "SELECT COUNT(*) AS nbr FROM UTILISATEURS WHERE login='$login'";
     $sth = $this->db->query($sql);
     $dispo = ($sth->fetchColumn()==0)?1:0;


     return $dispo;
   }

    function getLoginMdp($login) : array {
      $sql = "SELECT login,mdp FROM UTILISATEURS WHERE login='$login'";
      $sth = $this->db->query($sql);
      $res = $sth->fetchAll(PDO::FETCH_CLASS,'Membres');


      return $res;
    }

    function insertMembre($login,$mdp) {
      $query=$this->db->prepare('INSERT INTO UTILISATEURS (login, mdp) VALUES (:login,:pass)');
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':pass', $mdp, PDO::PARAM_STR);
      $query->execute();
      $query->CloseCursor();
    }

    function getTemplate(int $num): array {
        $req="Select * from template where num=$num;";
        $sth=$this->db->query($req);
        $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
        return $result;
    }

    function getNbTemplate() {
      $sql = "SELECT COUNT(*) as nbr FROM TEMPLATE";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }

    function getNbLivre() {
      $sql = "SELECT COUNT(*) as nbr FROM LIVRE";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }

    function createTemplateVide($num, $login, $theme, $nbpages, $public, $concours){
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

    function createLivreVide($num, $login, $template){
        $query=$this->db->prepare('INSERT INTO LIVRE (num, login, template) VALUES (:num, :login, :template)');
        $query->bindValue(':num', $num, PDO::PARAM_INT);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':template', $template, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    }


    function getInfoTemplate($num) {
      $req="SELECT login,theme, nbpages from template where num = $num ";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

    function getInfoLivre($num) {
      $req="SELECT login,template from livre where num = $num ";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'livre');
      return $result;
    }

    function getTemplatesConcours(): array {
            $req="SELECT * from template where concours = 1;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
            return $result;
        }


    function getTemplateWTheme($theme): array {
      $req="SELECT * FROM template WHERE theme = '$theme' AND public = 1;";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

    function getTemplateLogin($login): array {
      $req="SELECT * FROM template WHERE login = '$login';";
      $sth=$this->db->query($req);
      $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
      return $result;
    }

    function addLike($login,$num){
      $query=$this->db->prepare('INSERT INTO LIKETEMP (login, num) VALUES (:login, :num)');
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $ok = $query->execute();
      $query->CloseCursor();

      return $ok;
    }

    function delTemplate($num){
      $sql = "DELETE FROM TEMPLATE WHERE num =  :num";
      $query = $this->db->prepare($sql);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $query->execute();
    }

    function unLike($login,$num){
      $sql = "DELETE FROM LIKETEMP WHERE login =  :login AND num = :num";
      $query = $this->db->prepare($sql);
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':num', $num, PDO::PARAM_INT);
      $query->execute();
    }

    function getNbLike($num){

      $sql = "SELECT COUNT(*) AS nbr FROM LIKETEMP WHERE num = $num";
      $query = $this->db->query($sql);
      $res = $query->fetch();
      return $res[0];
    }

    function getTemplateSaison() {
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
