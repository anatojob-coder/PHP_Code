<?php
// Titre par défaut si non défini avant l'inclusion
$titrePage = $titrePage ?? 'Médiathèque IPNET';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titrePage, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <a href="index.php" class="logo">📚 Médiathèque <span>IPNET</span></a>
            <nav class="main-nav">
                <a href="index.php">Accueil</a>
                <a href="catalogue.php">Catalogue</a>
                <a href="apropos.php">À propos</a>
            </nav>
        </div>
    </header>
    <main class="container">
