<?php
class Produit
{

    public $code;
    public $nom;
    public $descript;
    public $categorie;
    public $prix;
    public $quantite;
    public $image; 



function ajout ()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="insert into produit (nom,descript,categorie,prix,quantite,image) values
('$this->nom','$this->descript','$this->categorie',$this->prix,$this->quantite,'$this->image')";
$pdo->exec($req) or print_r($pdo->errorInfo());
}


function lister()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM produit";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}


function listerLap()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM produit where categorie ='laptop'";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}

function listerSma()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM produit where categorie ='smartphone'";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}

function listerCas()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM produit where categorie ='casque'";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}





function supprimer($code)
{
    
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="DELETE FROM produit WHERE code=$code"; 
$pdo->exec($req);




}


function getetud($code)
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM produit where code=$code";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}








function modifierSimage($code)
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="UPDATE produit SET nom='$this->nom', 
descript='$this->descript' ,
 categorie='$this->categorie' , 
prix='$this->prix' ,
quantite ='$this->quantite' ,
 WHERE code=$code";
$pdo->exec($req) or print_r($pdo->errorInfo());
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

function modifier($code)
{
    require_once('pdo.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    
    $nom = $pdo->quote($this->nom);
    $descript = $pdo->quote($this->descript);
    $categorie = $pdo->quote($this->categorie);
    $prix = (float)$this->prix; 
    $quantite = (int)$this->quantite; 
    $image = $pdo->quote($this->image);

    $req = "UPDATE produit SET 
                nom=$nom, 
                descript=$descript,
                categorie=$categorie, 
                prix=$prix,
                quantite=$quantite,
                image=$image
            WHERE code=$code";

    $pdo->exec($req) or print_r($pdo->errorInfo());
}


}

?>