<?php

// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=dhalia;charset=utf8';
$username = 'root';
$password = '';

$bdd = new PDO($dsn, $username, $password);

// Vérification de la connexion
if (!$bdd) {
  die('Erreur de connexion : ' . $bdd->errorInfo());
}

// Préparation de la requête SQL
$query = $bdd->prepare("SELECT * FROM plantes WHERE coup_de_coeur = True LIMIT 3");

// Exécution de la requête
$query->execute();

// Récupération des résultats
$plantes = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dahlia Shop - Accueil</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="images/logo-64.png">
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <script src="jquery-3.6.4.js"></script>
  <script src="script.js"></script>
</head>

<body class="fond page-accueil">

  <nav class="menu">
    <ul class="col-sm-12">
      <img src="images/logo-64.png">
      <li><a href="accueil.php" class="active">Accueil</a></li>
      <li><a href="bouquets.php">Bouquets</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>

  <main>
    <section class="banner">
      <h1 class="fond-opaque">Bienvenue chez votre fleuriste</h1>
      <p class="fond-opaque">Nous vous proposons un large choix de fleurs pour toutes les occasions</p>
      <a href="bouquets.php" class="bouton-accueil">Voir nos produits</a>
    </section>

    <section class="sectionFond featured-products">
      <h2>Vos coups de coeur du mois</h2>
      <div class="product-grid">
        <?php
        // Affiche les trois plantes coup de coeur du mois
        foreach ($plantes as $plante) {
          $id = $plante['id'];
          $nom = $plante['nom'];
          $image = $plante['image'];

          echo '<div class="product-card">
                  <img src="' . $image . '" class="card-img-top" alt="' . $nom . '">
                  <h3>' . $nom . '</h3>
                  <a href="fleur.php?id=' . $id . '" class="product-link btn-secondary" data-productid="' . $id . '">Voir le produit</a>
                </div>';
        }
        ?>
      </div>
    </section>

    <section class="sectionFond newsletter">
      <h2>Inscrivez-vous à notre newsletter</h2>
      <form>
        <label for="email">Entrez votre email :</label>
        <input type="email" id="email" name="email" required>
        <a href="contact.html" class="btn-secondary">S'inscrire</a>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 - Dahlia Shop - Tous droits réservés</p>
  </footer>
</body>

</html>