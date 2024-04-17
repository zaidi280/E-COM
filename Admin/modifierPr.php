<?php 
require_once('../produit.class.php');
$us=new Produit();

if(isset($_POST['code'])) {
    $code = $_POST['code'];
    $us->nom = $_POST['nom'];
    $us->descript = $_POST['descript'];
    $us->categorie = $_POST['categorie'];
    $us->prix = $_POST['prix'];
    $us->quantite = $_POST['quantite'];
    $produit = $us->getetud($code)->fetch();
    // Vérifier si un fichier image a été envoyé
    if(isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $fichierTemp = $_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp, 'images/'.$image);
        if($image == '')
            $us->image=$produit['image'];
        else
        $us->image = '../images/'.$image;
    } else {
        // Aucun fichier image n'a été envoyé, utiliser l'image existante
        $us->image = $produit['image'];
    }

    $us->modifier($code);
  
    header('Location: produitUti.php');
    exit();
} else {
    // Gérer le cas où le code du produit n'est pas défini
    // Redirection vers une page d'erreur ou autre action appropriée
    header('Location: erreur.php');
    exit();
}
?>
