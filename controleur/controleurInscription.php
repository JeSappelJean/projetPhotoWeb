<?php
require_once('../model/freshCoolingDAO.class.php');
$BDD = new freshCoolingDAO();

$nbErr = 0;
$login = $_POST['login'];
$pass = md5($_POST['mdp']);
$confirm = md5($_POST['mdpConfirm']);
$listErr = array();

$mail_dispo=$BDD->getInfoMembre($login);

if(!$mail_dispo)
{
    array_push($listErr, "Votre mail est déjà utilisé par un membre");
    $nbErr++;
}


if ($pass != $confirm)
{
    array_push($listErr, "Votre mot de passe et votre confirmation diffèrent, ou sont vides");
    $nbErr++;
}
if ($nbErr==0)
{
     $BDD->insertMembre($login,$pass);
     $_SESSION['login'] = $login;
     include('../Vue/inscriptionOk.html');
 }
 else
 {
  include("../Vue/erreurInscription.php");
 }
 ?>
