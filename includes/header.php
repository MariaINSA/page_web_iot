<?php
// $page : 'accueil' | 'equipe' | 'produits' — défini par chaque page avant l'include
// $title : titre de la page
if (!isset($page)) { $page = 'accueil'; }
if (!isset($title)) { $title = 'Accueil'; }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($title); ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header class="site-header">
  <img src="assets/img/logo_page.png" alt="Logo du site" class="logo">
</header>

<!-- Menu de navigation du site -->
<ul class="navbar">
  <li<?php if ($page === 'accueil') echo ' class="active"'; ?>><a href="index.php">Accueil</a></li>
  <li<?php if ($page === 'equipe') echo ' class="active"'; ?>><a href="equipe.php">Équipe</a></li>
  <li<?php if ($page === 'produits') echo ' class="active"'; ?>><a href="produits.php">Produits</a></li>
</ul>
