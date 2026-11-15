<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Détail du livre - Médiathèque IPNET';
$livreTrouve = null;
$erreurId = '';

// Validation stricte du paramètre GET 'id'
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT) || (int) $_GET['id'] <= 0) {
    $erreurId = 'Identifiant de livre absent ou invalide.';
} else {
    $id = (int) $_GET['id'];
    $livreTrouve = trouverLivreParId($livres, $id);

    if ($livreTrouve === null) {
        $erreurId = 'Aucun livre ne correspond à l\'identifiant #' . htmlspecialchars((string) $id, ENT_QUOTES, 'UTF-8') . '.';
    } else {
        $titrePage = htmlspecialchars($livreTrouve['titre'], ENT_QUOTES, 'UTF-8') . ' - Médiathèque IPNET';
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="detail-section">
    <a href="catalogue.php" class="retour-lien">&larr; Retour au catalogue</a>

    <?php if ($erreurId !== ''): ?>
        <div class="alerte-erreur">
            <h2>Livre introuvable</h2>
            <p><?= $erreurId ?></p>
            <a href="catalogue.php" class="btn-primary">Voir tous les livres</a>
        </div>
    <?php else: ?>
        <div class="fiche-detail">
            <span class="categorie"><?= htmlspecialchars($livreTrouve['categorie'], ENT_QUOTES, 'UTF-8') ?></span>
            <h1><?= htmlspecialchars($livreTrouve['titre'], ENT_QUOTES, 'UTF-8') ?></h1>
            
            <ul class="infos-liste">
                <li><strong>Identifiant :</strong> #<?= (int) $livreTrouve['id'] ?></li>
                <li><strong>Auteur :</strong> <?= htmlspecialchars($livreTrouve['auteur'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Année de publication :</strong> <?= htmlspecialchars((string) $livreTrouve['annee'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Prix indicatif :</strong> <?= number_format((float) $livreTrouve['prix'], 0, ',', ' ') ?> FCFA</li>
                <li>
                    <strong>Disponibilité :</strong>
                    <?php if ($livreTrouve['disponible']): ?>
                        <span class="badge badge-dispo">Disponible en rayon</span>
                    <?php else: ?>
                        <span class="badge badge-indispo">Actuellement emprunté</span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
