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
    <title>Electronica</title>
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
    <!--debut carousel-->
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#hero-carousel"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#hero-carousel"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#hero-carousel"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active c-item">
          <img
            src="image/telsam.png"
            class="d-block w-100 c-img"
            alt="Slide 1"
          />
        </div>
        <div class="carousel-item c-item">
          <img
            src="image/victus.png"
            class="d-block w-100 c-img"
            alt="Slide 2"
          />
        </div>
        <div class="carousel-item c-item">
          <img
            src="image/laptop.png"
            class="d-block w-100 c-img"
            alt="Slide 3"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#hero-carousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!--fin carousel-->
    <!--image-->
    <div class="container px-4 text-center">
      <div class="row gx-5">
        <div class="col">
          <div class="p-3"><img src="image/tcl.png" class="rows" /></div>
        </div>
        <div class="col">
          <div class="p-3"><img src="image/casque.png" class="rows" /></div>
        </div>
      </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center">
      <img src="image/pc.png" />
    </div>
    <!--fin image-->
    <!--special offre-->
    <section>
      <div class="container">
        <div class="border"></div>
        <div class="content">
          <h1>Les meilleures ventes</h1>
        </div>
        <div class="border"></div>
      </div>
      <!-- 4 cards-->

      <?php
        require_once('produit.class.php');
        $us=new Produit();
        $s=$us->listerSma();
        $l=$us->listerLap();
        $c=$us->listerCas();
        
      
        ?>
        <?php
foreach ($s as $row) {}
foreach ($l as $row1) {}
foreach ($c as $row2) {}
?>




<div class="container text-center">
  <div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;"  >
      <img class="card-img-top"  height="250px"    src="images/<?php echo $row[6]; ?>" >
        <div class="card-body">
          <h5 class="card-title"><?php echo $row[1]; ?></h5>
          <p class="card-text"><?php echo $row[4]; ?></p> 
          <a href="produit.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    
    <div class="col">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top"  height="250px" src="images/<?php echo $row1[6]; ?>" >
        <div class="card-body">
          <h5 class="card-title"><?php echo $row1[1]; ?></h5>
          <p class="card-text"><?php echo $row1[4]; ?></p> 
          <a href="produit.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    
    <div class="col">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" height="250px" src="images/<?php echo $row2[6]; ?>" >
        <div class="card-body">
          <h5 class="card-title"><?php echo $row2[1]; ?></h5>
          <p class="card-text"><?php echo $row2[4]; ?></p> 
          <a href="produit.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>


        </div>
      </div>
    </section>
    <br />
    <div class="container d-flex justify-content-center align-items-center">
      <img src="image/meilleurprix.png" width="1100" height="250" />
    </div>
    <br /><br /><br />
    <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Qui Somme Nous ?</h6>
            <p class="text-justify">
              Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to
              help the upcoming programmers with the code. Scanfcode focuses on
              providing the most efficient code or snippets as the code wants to
              be simple. We will help programmers build up concepts in different
              programming languages that include C, C++, Java, HTML, CSS,
              Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="laptop.html">Laptops</a></li>
              <li>
                <a href="Smartphones.html">SmartPhones</a>
              </li>
              <li>
                <a href="ecouteur.html">Casques</a>
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
              <a href="#">ELECTRONICA</a>.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
