<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Catalogue - Médiathèque IPNET';

// Extraction dynamique des catégories uniques existantes dans le tableau
$categoriesDisponibles = [];
foreach ($livres as $livre) {
    if (!in_array($livre['categorie'], $categoriesDisponibles, true)) {
        $categoriesDisponibles[] = $livre['categorie'];
    }
}

$livresAffiches = $livres;
$messageErreur = '';
$categorieActive = '';

// Vérification du paramètre GET 'categorie'
if (isset($_GET['categorie']) && trim($_GET['categorie']) !== '') {
    $categorieDemandee = trim((string) $_GET['categorie']);
    $resultatFiltre = filtrerParCategorie($livres, $categorieDemandee);

    if (empty($resultatFiltre)) {
        $messageErreur = 'La catégorie « ' . htmlspecialchars($categorieDemandee, ENT_QUOTES, 'UTF-8') . ' » n\'existe pas dans notre catalogue.';
        $livresAffiches = [];
    } else {
        $livresAffiches = $resultatFiltre;
        $categorieActive = $categorieDemandee;
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="catalogue-section">
    <h1>Catalogue des ouvrages</h1>

    <!-- Barre de filtrage par catégorie -->
    <div class="filtres">
        <span>Filtrer par catégorie :</span>
        <a href="catalogue.php" class="filtre-btn <?= $categorieActive === '' && $messageErreur === '' ? 'actif' : '' ?>">
            Toutes
        </a>
        <?php foreach ($categoriesDisponibles as $cat): ?>
            <?php $isActif = (mb_strtolower($categorieActive) === mb_strtolower($cat)); ?>
            <a href="catalogue.php?categorie=<?= urlencode(mb_strtolower($cat)) ?>" 
               class="filtre-btn <?= $isActif ? 'actif' : '' ?>">
                <?= htmlspecialchars($cat, ENT_QUOTES, 'UTF-8') ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if ($messageErreur !== ''): ?>
        <div class="alerte-erreur">
            <p><?= $messageErreur ?></p>
            <a href="catalogue.php" class="btn-detail">Revenir à l'affichage complet</a>
        </div>
    <?php else: ?>
        <p class="compteur-affichage">
            Nombre de livres affichés : <strong><?= count($livresAffiches) ?></strong>
        </p>

        <div class="grille-livres">
            <?php foreach ($livresAffiches as $livre): ?>
                <?= afficherLivre($livre) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
