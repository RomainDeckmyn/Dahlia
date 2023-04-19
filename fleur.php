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

// Vérification si l'ID du produit est défini
if (!isset($_GET['id'])) {
  die('L\'ID du produit n\'est pas défini.');
}

$productid = $_GET['id'];

// Préparation de la requête SQL
$query = $bdd->prepare("SELECT * FROM plantes WHERE id= :productid");

// Liaison du paramètre :productid avec l'ID de la fleur sélectionnée
$query->bindParam(':productid', $productid);

// Exécution de la requête
$query->execute();

// Récupération des résultats
$fleur = $query->fetch();

// Vérification si la fleur existe
if (!$fleur) {
  die('Fleur non trouvée');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dahlia Shop - Nos Bouquets</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="images/logo-64.png">
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <script src="jquery-3.6.4.js"></script>
  <script src="script.js"></script>

</head>

<body class="fond">
  <nav class="menu ">
    <div>
      <ul>
        <img src="images/logo-64.png">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="bouquets.php" class="active">Bouquets</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
  </nav>

  <?php
  $id = $fleur['id'];
  $nom = $fleur['nom'];
  $image = $fleur['image'];
  $prix = $fleur['prix'];

  echo '
      <div class="col">
          <div class="card h-100">
            <img src="' . $image . '" class="card-img-top" alt="' . $nom . '">
            <div class="card-body">
              <h5 class="card-title">' . $nom . '</h5>
              <h5 class="card-text">' . $prix . '</h5>
            </div>
          </div>
      </div>';
  ?>

  <footer>
    <p>&copy; 2023 - Dahlia Shop - Tous droits réservés</p>
  </footer>

</body>

</html>