<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <!-- debut navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ELECTRONICA</a>
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
              <a class="nav-link active" aria-current="page" href="produit.php"
                >Produits</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Se Connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registre.html">S'inscrire</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- fin navbar -->
    <!--form login-->

   

<?php
    session_start();

    require_once "users.class.php";
    $us=new User();
    $email="";$pwd="";
    if (isset($_POST['email'])){
        $us->email =$_POST["email"];
        $us->pass=$_POST["pass"];
        //$us->pass=$_POST["type"];
        try{
            $res = $us->getUser();         
            $data = $res->fetchAll(PDO::FETCH_ASSOC);            
            if ($data){
                // $_SESSION["connecte"] = "1";
                $_SESSION["email"] = $data[0]["email"];
                $_SESSION["prenom"] = $data[0]["prenom"];

                $_SESSION["type"] = $data[0]["type"];
                
                $userType = $data[0]["type"];
                if ($userType === "utilisateur") {
                    header("location:utilisateur/indexUtil.php");
                } elseif ($userType === "admin") {
                    header("location:Admin/indexADM.php");
                } else {
                    
                    header("location:index.html");
                }
                exit();
            }
            else {
                echo "Aucun utilisateur trouvé.";
            }
        }
        catch (PDOException $e){
            echo "ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine();
        }
    }
?>









    <form class="p-5" action="login.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          name="email"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          name="pass"
        />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!--fin form login-->
    <br /><br />
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
              <li><a href="laptop.php">Laptops</a></li>
              <li>
                <a href="Smartphones.php">SmartPhones</a>
              </li>
              <li>
                <a href="ecouteur.php">Casques</a>
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
              <a href="index.php">ELECTRONICA</a>.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
