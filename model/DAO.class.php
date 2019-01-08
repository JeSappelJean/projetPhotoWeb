<!--Class DAO du projet + definition de différentes fonctions-->
<?php
/* pour recreer la base executer ces commandes une par une apres avoir ouvert la base sqlite (commande shell: sqlite3 photoWeb.db)

.read create.sql
.separator |
.import template.txt template
.+ autres ( ce que vous rajouter)*/

  require_once('../model/template.class.php');

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

    function createTemplateVide($num, $theme, $nbpages){
        $query=$this->db->prepare('INSERT INTO TEMPLATE (num, theme, nbpages) VALUES (:num,:theme, :nbpages)');
        $query->bindValue(':num', $num, PDO::PARAM_INT);
        $query->bindValue(':theme', $theme, PDO::PARAM_STR);
        $query->bindValue(':nbpages', $nbpages, PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
    }

  function getTemplateWTheme($theme): array {
    $sql = "SELECT * FROM TEMPLATE WHERE theme = '$theme'";
    $sth = $this->db->query($sql);
    $res = $sth->fetchAll(PDO::FETCH_CLASS,'template');
    return $res;
  }

    /*Fonction non testée
    function getAllTemplate(): array {
        $req="Select * from template;";
        $sth=$this->db->query($req);
        $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
        return $result;
    }*/


}
?>
