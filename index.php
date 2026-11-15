<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Accueil - Médiathèque IPNET';
$nbDisponibles = compterLivresDisponibles($livres);
$nbTotal = count($livres);

require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <h1>Bienvenue à la Médiathèque IPNET</h1>
    <p>Explorez notre collection d'ouvrages académiques, littéraires et scientifiques directement en ligne.</p>
    
    <div class="stats-box">
        <p>
            Actuellement, <strong><?= $nbDisponibles ?></strong> livre(s) disponible(s) sur un total de <strong><?= $nbTotal ?></strong> ouvrages référencés.
        </p>
    </div>

    <a href="catalogue.php" class="btn-primary">Consulter le catalogue complet</a>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
