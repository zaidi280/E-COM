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
    <title>Page de Commande</title>
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
              <a class="nav-link active" href="produitUti.php">Produits</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="panier.php">Panier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="listecommandes.php"
                >liste commandes </a
              > 

     
            <!-- <li class="nav-item">
              <a class="nav-link" href='compte.php?email=<?php echo $_SESSION['email']; ?>'>Compte</a>
</li>  -->
            <li class="nav-item">
              <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- fin navbar -->
    <!--form de commande-->
    <br /><br />
    <form  method="POST"  action="enregistreC.php" enctype="multipart/form-data">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Nom</th>
          <th scope="col">Quantité</th>
          <th scope="col">Prix</th>
          <th scope="col">Email</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
    <?php 
    

//session_start();
if(isset($_POST['email'])) {
  // Récupérez l'email depuis $_POST
  $email = $_POST['email'];
  
  // Vous pouvez ensuite stocker l'email dans la session si nécessaire
  $_SESSION['email'] = $email;
  
  // Redirigez l'utilisateur vers une autre page ou effectuez d'autres actions

  exit(); // Assurez-vous de terminer le script après la redirection
}
$totalPrix = 0;
// Vérifiez si une action est demandée (ajouter, supprimer, vider)
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'ajouter':
            if(isset($_GET['code']) && isset($_GET['nom']) && isset($_GET['prix'])) {
                $produit = array(
                    'code' => $_GET['code'],
                    'nom' => $_GET['nom'],
                    'prix' => $_GET['prix'],
                    
                    
                );

                // Ajoutez le produit à la session du panier
                
                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = array();
                }
                array_push($_SESSION['panier'], $produit);
            }
            header('Location: panier.php');
            exit();
            break;
        case 'supprimer':
              if(isset($_GET['index'])) {
                  $index = $_GET['index'];
                  // Supprimez le produit du panier en utilisant son index
                  unset($_SESSION['panier'][$index]);
              }
              // Redirection vers la page du panier après la suppression
              header('Location: panier.php');
              exit();
              break;
        // Autres cas pour supprimer, vider le panier, etc.
    }
}


// Affichez les produits dans le panier

if(isset($_SESSION['panier'])) {

    foreach ($_SESSION['panier'] as $index => $produit):
      
      // Vérifiez si la quantité est définie pour ce produit, sinon initialisez-la à 1
      $quantitecom = isset($produit['quantitecom']) ? $produit['quantitecom'] : 1;
        
      // Récupérez la quantité à partir du champ d'entrée
      if(isset($_POST['quantitecom'.$index])) {
          $quantitecom = $_POST['quantitecom'.$index];
          // Mettez à jour la quantité dans le panier
          $_SESSION['panier'][$index]['quantitecom'] = $quantitecom;
      }
      
      // Calculer le prix total du produit en multipliant le prix unitaire par la quantité
      $prixTotalProduit = $produit['prix'] * $quantitecom;
      // Ajoutez le prix total du produit au total des prix
      $totalPrix += $prixTotalProduit;
      
    


      ?>

    
      <tbody>
        <tr>
            <th scope="row">       
              <input readonly  name="idproduit" value="<?php echo $produit['code']; ?>">
      </th>


            <td>
              <input  readonly value="<?php echo $produit['nom']; ?>">
            </td>
                    
            <td>
              
            <input
              type="number"
              id="quantitecom"
              name="quantitecom"
              min="1"
              value="1"
              required
              class="form-control"
              style="width: 100px;"
            />

          </td>

   
          </td>
            
            <td>
              <input  name="prix" readonly value="<?php echo $produit['prix']; ?>">
            </td>


          
            <td>
              <input type="text"
             name="useremail" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" 
             class="form-control" readonly id="useremail">
          </td>
<td>



            <a href="panier.php?action=supprimer&index=<?php echo $index; ?>" class="btn btn-danger w-60">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-trash3"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"
                />
              </svg>
    </a>
    
    <input  class="btn btn-success w-60" type="submit" value="Ajouter">
            </td>
            
        </tr>
        
    <?php endforeach;
}
?>

      </tbody>
    </table>
    </form>

    <!--fin form de commande-->
    <br /><br />
    <!-- Affichage de la commande -->
    <div class="container" id="orderConfirmation" style="display: none">
      <h2>Votre Commande</h2>
      <p><strong>Produit:</strong> <span id="confirmProduct"></span></p>
      <p><strong>Quantité:</strong> <span id="confirmQuantity"></span></p>
      <p><strong>Nom:</strong> <span id="confirmName"></span></p>
      <p><strong>Email:</strong> <span id="confirmEmail"></span></p>
      <p>
        <strong>Adresse de Livraison:</strong> <span id="confirmAddress"></span>
      </p>
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
