<?php
  class DAO{
    private $db;

    function __construct(){
      try{
        $this->db = new PDO('sqlite:../model/Data/freshCooling.db');
      }
      catch(PDOException $e){
        die("erreur de connexion :".$e->getmessage());
      }
    }

    function getInfoMembre($login) : bool{
     $sql = "SELECT COUNT(*) AS nbr FROM membre WHERE login='$login'";
     $sth = $this->db->query($sql);
     $dispo = ($sth->fetchColumn()==0)?1:0;


     return $dispo;
    }

    function getLoginMdp($login) : array {
      $sql = "SELECT login,mdp FROM membre WHERE login='$login'";
      $sth = $this->db->query($sql);
      $res = $sth->fetchAll(PDO::FETCH_CLASS,'Membres');


      return $res;
    }

    function insertMembre($login,$mdp) {
  $query=$this->db->prepare('INSERT INTO membre (login, mdp) VALUES (:login,:pseudo)');

  $query->bindValue(':login', $login, PDO::PARAM_STR);
  $query->bindValue(':pass', $mdp, PDO::PARAM_STR);
  $query->execute();
  $query->CloseCursor();
}

?>
