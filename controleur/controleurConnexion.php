<?php
session_start();
require_once('../model/DAO.class.php');
$BDD = new DAO();
require_once('../model/membre.class.php');

if ((empty($_POST['mail']) || empty(md5($_POST['mdp']))) && (isset($_POST['mail']) && isset($_POST['mdp']))) {
    include("../Vue/connexionErreur.vue.html");
} else if (isset($_POST['mail'])) {

    $data = $BDD->getMailMdp($_POST['mail']);
    if (!empty($data)) {
        if ($data[0]->mdp == md5($_POST['mdp']))
 {
            $_SESSION['mail'] = $data[0]->login;
            include('../Vue/vueAccueil.vue.php');
        }
        else
 {
            include("../Vue/vueConnexionErr.vue.html");
        }
    } else {
        include("../Vue/vueConnexionErr.vue.html");
    }
} else {
    include('../Vue/vueAccueil.php');
}
 ?>
