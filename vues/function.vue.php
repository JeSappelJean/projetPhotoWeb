<?php
 /*Différentes fonctions qui seront utilisées dans nos vues: */
 function createTemplateVide(){
     $req="insert into template values (121, null, null)";
     $sth=$this->db->query($req);
     $result=$sth->fetchAll(PDO::FETCH_CLASS,'template');
     return $result;
 }
?>
