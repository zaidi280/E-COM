
<?php
class User
{
    /* attributs de la classe utilisateur*/
    public $email;
    public $pass;
    public $nom;
    public $prenom; 
    public $telephone;
    public $type;

    function insertuser()
    {
        require_once('pdo.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "insert into users (email, pass,nom, prenom,telephone) 
        values('$this->email','$this->pass','$this->nom','$this->prenom','$this->telephone')";
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }


    function listerusers()
    {
    require_once('pdo.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM users";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }

    function listerUtilisateur()
    {
    require_once('pdo.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM users where type='utilisateur'";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }







    function getUser()
{
require_once('pdo.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="SELECT * FROM users where email='$this->email' AND  pass='$this->pass'";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}
   

    // function getusers($email,$pass)
    // {
    //     require_once('pdo.php');
    //     $cnx = new connexion();
    //     $pdo = $cnx->CNXbase();
    //     $req = "SELECT * FROM users where email=$email AND  pass=$pass ";
    //     $res = $pdo->query($req) or print_r($pdo->errorInfo());
    //     return $res;
    // }


    function getusers($email)
{
    require_once('pdo.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($req);
    $stmt->execute(['email' => $email]);
    return $stmt;
}

function supprimer($email)
{
    require_once('pdo.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "DELETE FROM users WHERE email='$email'"; // entourer $email de guillemets simples
    $pdo->exec($req);
}
    




    
    // function modifier_user($email)
    // {
    //     require_once('pdo.php');
    //     $cnx = new connexion();
    //     $pdo = $cnx->CNXbase();
    //     $req = "UPDATE users SET 
    //     email='$this->email',
    //     pass='$this->pass',
    //     nom='$this->nom',
    //     prenom='$this->prenom',
    //     telephone='$this->telephone',
       
        
    //      WHERE email='$email'";
    //     $pdo->exec($req) or print_r($pdo->errorInfo());
    // }


    function modifier_user($email)
{
    require_once('pdo.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "UPDATE users SET 
            email='$this->email',
            pass='$this->pass',
            nom='$this->nom',
            prenom='$this->prenom',
            telephone='$this->telephone'
            WHERE email='$email'";
    $pdo->exec($req) or print_r($pdo->errorInfo());
}

// Assume $_SESSION['logged_in_user_email'] holds the email of the logged-in user

// Call modifier_user function with logged-in user's email


// function modifier_user($logged_in_email)
// {
//     require_once('pdo.php');
//     $cnx = new connexion();
//     $pdo = $cnx->CNXbase();
    
//     // Retrieve data of the logged-in user
//     $req_select = "SELECT * FROM users WHERE email=:email";
//     $stmt_select = $pdo->prepare($req_select);
//     $stmt_select->bindParam(':email', $logged_in_email);
//     $stmt_select->execute();
//     $user = $stmt_select->fetch(PDO::FETCH_ASSOC);
    
//     if (!$user) {
//         // Handle case where user does not exist
//         return false;
//     }
    
//     // Update user data
//     $req_update = "UPDATE users SET 

//                    pass=:pass,
//                    nom=:nom,
//                    prenom=:prenom,
//                    telephone=:telephone
//                    WHERE email=:email";
//     $stmt_update = $pdo->prepare($req_update);
//     $stmt_update->bindParam(':pass', $user['pass']);
//     $stmt_update->bindParam(':nom', $user['nom']);
//     $stmt_update->bindParam(':prenom', $user['prenom']);
//     $stmt_update->bindParam(':telephone', $user['telephone']);
//     $stmt_update->bindParam(':email', $logged_in_email);
    
//     if ($stmt_update->execute()) {
//         // Update successful
//         return true;
//     } else {
//         // Handle update failure
//         return false;
//     }
// }



}
