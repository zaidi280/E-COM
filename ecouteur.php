<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Produit</title>
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
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
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
              <a class="nav-link active" aria-current="page" href="produit.html"
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

    <!-- Contenu principal -->
    <div class="container-fluid mt-3">
      <div class="row">
        <!-- Barre de navigation latérale -->
        <div class="col-md-3">
          <div class="list-group">
            <a
              href="produit.php"
              class="list-group-item list-group-item-action"
              >Toutes les catégories</a
            >
            <a href="laptop.php" class="list-group-item list-group-item-action"
              >Laptops</a
            >
            <a
              href="Smartphones.php"
              class="list-group-item list-group-item-action"
              >SmartPhones</a
            >
            <a
              href="ecouteur.php"
              class="list-group-item list-group-item-action active"
              >Casques</a
            >
          </div>
        </div>

        <?php
        require_once('produit.class.php');
        $us=new Produit();
        $res=$us->listerCas();
        ?>
        
        <div class="col-md-9">
          <div class="row">
            
            <?php foreach($res as $row): ?>
              <div class="col-md-4 mb-3">
                <div class="card">
                <img class="card-img-top" src="images/<?php echo $row[6]; ?>" >
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row[1]; ?></h5>
                    <p class="card-text"><?php echo $row[4]; ?></p>
                    <a href="login.php" class="btn btn-primary">Acheter</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- Fin de la boucle PHP -->
          </div>
        </div>
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
