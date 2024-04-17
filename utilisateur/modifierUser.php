<?php 
require_once "../session.php"; 
require_once('../users.class.php');


$us = new User();
$us->email = $_POST['email'];
$us->pass = $_POST['pass'];
$us->nom = $_POST['nom'];
$us->prenom = $_POST['prenom'];
$us->telephone = $_POST['telephone'];

$us->modifier_user($us->email);


header('location:indexUtil.php');
?>
