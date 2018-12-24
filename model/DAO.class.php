<?php
  /*require_once('../model/template.class.php');*/

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

    /*function getInfoMembre($login) : bool {
     $sql = "SELECT COUNT(*) AS nbr FROM UTILISATEURS WHERE login='$login'";
     $sth = $this->db->query($sql);
     $dispo = ($sth->fetchColumn()==0)?1:0;


     return $dispo;
   }*/

    /*function getLoginMdp($login) : array {
      $sql = "SELECT login,mdp FROM UTILISATEURS WHERE login='$login'";
      $sth = $this->db->query($sql);
      $res = $sth->fetchAll(PDO::FETCH_CLASS,'Membres');


      return $res;
    }*/

    function insertMembre($login,$mdp) {
      $query=$this->db->prepare('INSERT INTO UTILISATEURS (login, mdp) VALUES (:login,:pass)');
      $query->bindValue(':login', $login, PDO::PARAM_STR);
      $query->bindValue(':pass', $mdp, PDO::PARAM_STR);
      $query->execute();
      $query->CloseCursor();
    }

    /*Fonction non testée
    function getTemplate(int $num): array {
        $req="Select * from template where num=$num;";
        $sth=$this->db->query($req);
        $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
        return $result;
    }*/

    /*Fonction non testée | 121 devra etre remplacé par le dernier num des templates + 1*/
    function createTemplateVide(){
        $req="INSERT INTO template values (121, null, null) ";
        $sth=$this->db->query($req);
        $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
        return $result;
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
