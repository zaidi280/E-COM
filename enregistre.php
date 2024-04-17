<?php 
// require_once "header.php";
// require_once "session.php";
// Verifier_session();
// require_once "pdo.php";

?> 


<?php
require_once('users.class.php');
$us=new User();
$us->email=$_POST['email'];
$us->pass=$_POST['pass'];
$us->nom=$_POST['nom'];
$us->prenom=$_POST['prenom'];
$us->telephone=$_POST['telephone'];
//header('location:produitUti.html');
$us->insertuser();
header('location:login.php');
?>