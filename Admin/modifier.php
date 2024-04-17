<?php
session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'admin') {
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
        <a class="navbar-brand" href="indexADM.php">ELECTRONICA</a>
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
              <a class="nav-link" href="produitUti.php">Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AjoutProduit.php">AjoutProduit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listeUsers.php">Liste des users</a>
</li>  
            <li class="nav-item">
              <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- fin navbar -->

    <?php require_once('../produit.class.php');
    $us=new Produit();
    $res=$us->getetud($_GET['code']);
    $data=$res->fetchAll(PDO::FETCH_ASSOC);
    $code= $data[0]["code"];
    $nom=$data[0]["nom"] ;
    $descript=$data[0]["descript"] ;
    $categorie=$data[0]["categorie"] ;
    $prix=$data[0]["prix"] ;
    $quantite=$data[0]["quantite"] ;
    $image=$data[0]["image"] ;
    ?>




    <form class="p-5" action="modifierPr.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label" for="code">Référence du Produit:</label
        ><br />
        <input
          class="form-control"
          type="number"
          id="code"
          name="code"
          value ="<?php echo $code ?>"
        /><br />
      </div>
      <div class="mb-3">
        <label class="form-label" class="form-label" for="nom"
          >Nom du Produit:</label
        ><br />
        <input
          class="form-control"
          type="text"
          id="nom"
          name="nom"
          value ="<?php echo $nom ?>"
        /><br />
      </div>
      <div class="mb-3">
        <label class="form-label" for="descript"
          >Description du Produit:</label
        ><br />
        <input type="text"
          class="form-control"
          id="descript"
          name="descript"
          rows="4"
          cols="50"
          value ="<?php echo $descript ?>"
        ></input
        ><br />
      </div>

      <div class="mb-3">
        <label class="form-label" for="categorie">Categorie</label><br />
        <select name="categorie" class="form-control">
            <option value="laptop" <?php if ($categorie === 'laptop') echo 'selected'; ?>>laptop</option>
            <option value="smartphone" <?php if ($categorie === 'smartphone') echo 'selected'; ?>>smartphone</option>
            <option value="casque" <?php if ($categorie === 'casque') echo 'selected'; ?>>casque</option>
            
        </select>
        </div>
        <br />







      <div class="mb-3">
        <label class="form-label" for="quantite">Quantité en Stock:</label
        ><br />
        <input
          class="form-control"
          type="number"
          id="quantite"
          name="quantite"
          value ="<?php echo $quantite ?>"
        /><br />
      </div>

      <div class="mb-3">
        <label class="form-label" for="prix">Prix du Produit:</label><br />
        <input
          class="form-control"
          type="number"
          id="prix"
          name="prix"
          value ="<?php echo $prix ?>"
        /><br />


      


        <div class="mb-3">
    <label class="form-label" for="photo">Photo du Produit:</label><br />
    <input
        class="form-control"
        type="file"
        id="image"
        name="image"
        accept="image/*"
    >
    <?php
    if (!empty($image)) {
        echo "<img src=$image />";
    }
?>
</div>



        <br />
      </div>
      <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Modifier" />
      </div>
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
              <a href="indexADM.php">ELECTRONICA</a>.
            </p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
