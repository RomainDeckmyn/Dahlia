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
$query = $bdd->prepare("SELECT * FROM plantes");

// Exécution de la requête
$query->execute();

// Récupération des résultats
$plantes = $query->fetchAll();

?>

<?php
// Fonction de tri à bulles pour trier les plantes en fonction du prix
function tri_a_bulles($tab)
{
  $n = count($tab);
  do {
    $permut = false;
    for ($i = 0; $i < $n - 1; $i++) {
      if ($tab[$i]['prix'] > $tab[$i + 1]['prix']) {
        $tmp = $tab[$i];
        $tab[$i] = $tab[$i + 1];
        $tab[$i + 1] = $tmp;
        $permut = true;
      }
    }
    $n--;
  } while ($permut);
  return $tab;
}

// Tri des plantes en fonction du prix
$plantes_triees = tri_a_bulles($plantes);
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

  <body>

    <div class="container">
      <form class="form-inline row" id="form-tri">
        <div class="col-md-6">
          <h4>Trier par prix</h4>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="sort-price-asc" name="tri-prix-croissant" value="true" onclick="CheckActif('sort-price-asc')">
            <label class="form-check-label" for="sort-price-asc">Prix croissant</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="sort-price-desc" name="tri-prix-décroissant" value="true" onclick="CheckActif('sort-price-desc')">
            <label class="form-check-label" for="sort-price-desc">Prix décroissant</label>
          </div>
        </div>
        <div class="col-md-6">
          <h4>Trier par événement</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sort-anniv" name="tri-anniv" value="true" onclick="CheckActif('sort-anniv')">
            <label class="form-check-label" for="sort-anniv">Anniversaire</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sort-mariage" name="tri-mariage" value="true" onclick="CheckActif('sort-mariage')">
            <label class="form-check-label" for="sort-mariage">Mariage</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sort-GM" name="tri-GM" value="true" onclick="CheckActif('sort-GMg')">
            <label class="form-check-label" for="sort-GM">Fêtes des grands-mères</label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn-secondary">Trier</button>
        </div>
      </form>
    </div>

    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php

        if (isset($_GET['tri-prix-croissant']) && $_GET['tri-prix-croissant'] === 'true') {
          // Boucle pour afficher chaque produit dans une carte Bootstrap
          foreach ($plantes_triees as $plante) {
            $id = $plante['id'];
            $nom = $plante['nom'];
            $image = $plante['image'];
            $prix = $plante['prix'];

            echo '
            <div class="col">
              <a href="fleur.php?id=' . $id . '" class="bouquet-lien product-link" data-productid="' . $id . '">
                <div class="card h-100">
                  <img src="' . $image . '" class="card-img-top" alt="' . $nom . '">
                  <div class="card-body">
                    <h5 class="card-title">' . $nom . '</h5>
                    <h5 class="card-text">' . $prix . '</h5>
                  </div>
                </div>
              </a>
            </div>';
          }
        }
        elseif (isset($_GET['tri-prix-décroissant']) && $_GET['tri-prix-décroissant'] === 'true') {
          // Inverser le tableau
          $plantes_decroissant = array_reverse($plantes_triees, true);
          // Boucle pour afficher chaque produit dans une carte Bootstrap
          foreach ($plantes_decroissant as $plante) {
            $id = $plante['id'];
            $nom = $plante['nom'];
            $image = $plante['image'];
            $prix = $plante['prix'];

            echo '
            <div class="col">
              <a href="fleur.php?id=' . $id . '" class="bouquet-lien product-link" data-productid="' . $id . '">
                <div class="card h-100">
                  <img src="' . $image . '" class="card-img-top" alt="' . $nom . '">
                  <div class="card-body">
                    <h5 class="card-title">' . $nom . '</h5>
                    <h5 class="card-text">' . $prix . '</h5>
                  </div>
                </div>
              </a>
            </div>';
          }
        }
        else {
          // Afficher les plantes dans l'ordre de la base de données
          foreach ($plantes as $plante) {
            $id = $plante['id'];
            $nom = $plante['nom'];
            $image = $plante['image'];
            $prix = $plante['prix'];

            echo '
              <div class="col">
                <a href="fleur.php?id=' . $id . '" class="bouquet-lien product-link" data-productid="' . $id . '">
                  <div class="card h-100">
                    <img src="' . $image . '" class="card-img-top" alt="' . $nom . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $nom . '</h5>
                      <h5 class="card-text">' . $prix . '</h5>
                    </div>
                  </div>
                </a>
              </div>';
          }
        }
        ?>
      </div>
    </div>

    <footer>
      <p>&copy; 2023 - Dahlia Shop - Tous droits réservés</p>
    </footer>
  </body>

</html>