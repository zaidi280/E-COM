<?php
class Commande
{

    public $idcommande;
    public $idproduit;
    public $useremail;
    public $quantitecom;
    public $prix;
   


function ajout ()
{
require_once('../pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req = "INSERT INTO commande (idcommande, idproduit, quantitecom, useremail, prix) VALUES
        ('$this->idcommande', '$this->idproduit', $this->quantitecom, '$this->useremail', '$this->prix')";

$pdo->exec($req) or print_r($pdo->errorInfo());
}


function listerC($useremail)
{
require_once('../pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM commande where useremail='$useremail'";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}


public function ajoutC()
    {
        require_once('../pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        
        // Récupérer la quantité disponible du produit
        $stmt = $pdo->prepare("SELECT quantite FROM produit WHERE code = :code");
        $stmt->bindParam(':code', $this->idproduit);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $quantite_disponible = $row['quantite'];

        // Vérifier si la quantité disponible est suffisante pour la commande
        if ($quantite_disponible >= $this->quantitecom) {
            // Insérer la commande
            $req = "INSERT INTO commande (idcommande, idproduit, quantitecom, useremail, prix) VALUES
                (:idcommande, :idproduit, :quantitecom, :useremail, :prix)";
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idcommande', $this->idcommande);
            $stmt->bindParam(':idproduit', $this->idproduit); // Utilisation de la variable idproduit dans la commande
            $stmt->bindParam(':quantitecom', $this->quantitecom);
            $stmt->bindParam(':useremail', $this->useremail);
            $stmt->bindParam(':prix', $this->prix);
            $stmt->execute();

            // Mettre à jour la quantité disponible
            $nouvelle_quantite = $quantite_disponible - $this->quantitecom;
            $stmt = $pdo->prepare("UPDATE produit SET quantite = :quantite WHERE code = :code");
            $stmt->bindParam(':quantite', $nouvelle_quantite);
            $stmt->bindParam(':code', $this->idproduit);
            $stmt->execute();
        } else {
            echo "Quantité disponible insuffisante.";
        }
    }







function lister()
{
require_once('../pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM commande";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}











// function modifier($code)
// {
// require_once('pdo.php');
// $cnx=new connexion();
// $pdo=$cnx->CNXbase();
// $req="UPDATE produit SET nom='$this-> nom', 
// descript='$this->descript'
//  categorie='$this->categorie' , 
// prix='$this->prix' ,
// quantite ='$this->quantite' ,
//  image ='$this->image' 
//  WHERE code=$code";
// $pdo->exec($req) or print_r($pdo->errorInfo());
// }


}

?>