<?php


require_once('commande.class.php');
$us=new commande();
$us->idcommande=$_POST['idcommande'];
$us->idproduit=$_POST['idproduit'];
$us->useremail=$_POST['useremail'];
$us->quantitecom=$_POST['quantitecom'];
$us->prix=$_POST['prix']*$_POST['quantitecom'];
$us->ajoutC();

header('location:listecommandes.php');
?>