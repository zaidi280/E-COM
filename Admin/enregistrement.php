 <?php 
// require_once "header.php";
// require_once "session.php";
// Verifier_session();
// require_once "pdo.php";

?> 


<?php
require_once('../produit.class.php');
$us=new Produit();
$us->nom=$_POST['nom'];
$us->descript=$_POST['descript'];
$us->categorie=$_POST['categorie'];
$us->prix=$_POST['prix'];
$us->quantite=$_POST['quantite'];

if(isset($_FILES["image"])) {
    $dossierDeDestination = "../images/";
    $nomFichier = $_FILES["image"]["name"];
    $cheminDeDestination = $dossierDeDestination . $nomFichier;
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $cheminDeDestination)) {
        $us->image = $cheminDeDestination;
        $us->ajout();
      
    } else {
        echo "Une erreur est survenue lors du téléchargement de l'image.";
    }
} else {
    echo "Aucune image n'a été téléchargée.";
}


header('location:produitUti.php');
?>