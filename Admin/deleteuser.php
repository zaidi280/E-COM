<?php
require_once('../users.class.php');
$us=new User();
$us-> supprimer($_GET['email']);
header("location:indexADM.php"); 
?>