<?php
session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'utilisateur') {
    echo "Vous n'avez pas les autorisations nécessaires pour accéder à cette page.";
 
    exit(); 
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compte</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <!-- debut navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexUtil.php">ELECTRONICA</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <div class="nav-link">
            <?php echo $_SESSION['prenom']; ?>
            </div>
</li> 


            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="produitUti.php"
                >Produits</a
              >
            </li>


            <li class="nav-item">
              <a class="nav-link" href="panier.php">Panier</a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="compte.html">Compte</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="../login.html">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- fin navbar -->
    <?php
require_once('../users.class.php');
$us = new User();
$email = isset($_GET['email']) ? $_GET['email'] : ''; 
$res = $us->getusers($email);
if ($res) {
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        $pass = $data[0]["pass"];
        $email = $data[0]["email"];
        $nom = $data[0]["nom"];
        $prenom = $data[0]["prenom"];
        $telephone = $data[0]["telephone"];
      
    } else {
        
        echo "No user found for the provided email.";
    }
} else {
    
    echo "Error fetching user data.";
}
?>




    <!--form login-->
    <form class="p-5" action="modifierUser.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="email"
          value ="<?php echo $email ?>"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          name="pass"
          value ="<?php echo $pass ?>"
        />
      </div>
      <div class="mb-3" >
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="nom"  value ="<?php echo $nom ?>"/>
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="prenom" value ="<?php echo $prenom ?>"/>
      </div>
      
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"
          >Num-Telephone</label
        >
        <input type="number" class="form-control" id="exampleInputPassword1" name="telephone" value ="<?php echo $telephone ?>" />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!--fin form login-->
    <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Qui Somme Nous ?</h6>
            <p class="text-justify">
            Nous sommes une équipe passionnée au service de vos besoins technologiques. 
            Notre site e-commerce est dédié à la vente de téléphones et d'ordinateurs, offrant une gamme diversifiée de produits de qualité pour répondre à toutes vos exigences. 
            Avec notre expertise et notre engagement envers l'excellence du service client, nous sommes là pour vous aider à trouver les solutions technologiques parfaites pour vous, que ce soit pour le travail, les loisirs ou les deux.
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="laptoputi.php">Laptops</a></li>
              <li>
                <a href="smartphonesutil.php">SmartPhones</a>
              </li>
              <li>
                <a href="ecouteurutil.php">Casques</a>
              </li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Contact</h6>
            <ul class="footer-links">
              <li><p>Email : Electronica@gmail.com</p></li>
              <li><p>Telephone : 55698410</p></li>
              <li>Adresse : Nasria Sfax2</li>
            </ul>
          </div>
        </div>
        <hr />
      </div>
      <div class="container">
        <div>
          <div>
            <p class="copyright-text">
              Copyright &copy; 2017 All Rights Reserved by
              <a href="indexUtil.php">ELECTRONICA</a>.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
