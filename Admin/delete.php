<?php
require_once('../produit.class.php');
$us=new Produit();
$us-> supprimer($_GET['code']);
header("location:produitUti.php"); 
?>