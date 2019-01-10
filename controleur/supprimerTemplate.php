<?php
session_start();
require_once('../model/DAO.class.php');

$dao->delTemplate($_GET['id']);

include('../vues/vueSuppressionOk.php');

 ?>
