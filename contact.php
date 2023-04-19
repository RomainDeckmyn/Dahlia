<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dahlia Shop - Contact</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/png" href="images/logo-64.png">
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</head>

<body class="fond">
  <nav class="menu">
    <ul class="col-sm-12">
      <img src="images/logo-64.png">
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="bouquets.php">Bouquets</a></li>
      <li><a href="contact.php" class="active">Contact</a></li>
    </ul>
  </nav>

  <!-- Contenu de la page -->
  <div class="container">
    <h1>Informations de la boutique</h1>
    <div class="infos">
      <h5>Dahlia Shop</h5>
      <p>176 rue du congrès</p>
      <p>69007 LYON</p>
    </div>
    <div class="infos">
      <h5>Appelez nous</h5>
      <p>04 74 52 90 04</p>
    </div>
  </div>

  <!-- Formulaire de contact -->
  <div class="container">
    <h1>Contactez-nous</h1>
    <form>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom complet*</label>
        <input type="text" class="form-control" id="nom" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Adresse email*</label>
        <input type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="sujet" class="form-label">Sujet*</label>
        <select type="sujet" class="form-control form-control-select" id="sujet" required>
          <option value="1">Service Client</option>
          <option value="2">Demande Spéciale</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message*</label>
        <textarea class="form-control" id="message" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
  </div>

  <footer>
    <p>&copy; 2023 - Dahlia Shop - Tous droits réservés</p>
  </footer>

</body>

</html>