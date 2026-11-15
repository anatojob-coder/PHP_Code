<?php

/**
 * Génère le code HTML d'une carte représentant un livre.
 */
function afficherLivre(array $livre): string
{
    $id = (int) $livre['id'];
    $titre = htmlspecialchars((string) $livre['titre'], ENT_QUOTES, 'UTF-8');
    $auteur = htmlspecialchars((string) $livre['auteur'], ENT_QUOTES, 'UTF-8');
    $annee = htmlspecialchars((string) $livre['annee'], ENT_QUOTES, 'UTF-8');
    $categorie = htmlspecialchars((string) $livre['categorie'], ENT_QUOTES, 'UTF-8');
    $prix = number_format((float) $livre['prix'], 0, ',', ' ') . ' FCFA';

    $statutClasse = $livre['disponible'] ? 'badge-dispo' : 'badge-indispo';
    $statutTexte = $livre['disponible'] ? 'Disponible' : 'Emprunté';

    return <<<HTML
    <article class="carte-livre">
        <div class="carte-header">
            <span class="categorie">{$categorie}</span>
            <span class="badge {$statutClasse}">{$statutTexte}</span>
        </div>
        <h3>{$titre}</h3>
        <p class="auteur">Par <strong>{$auteur}</strong> ({$annee})</p>
        <p class="prix">{$prix}</p>
        <a href="detail.php?id={$id}" class="btn-detail">Voir les détails</a>
    </article>
    HTML;
}

/**
 * Filtre le tableau des livres selon une catégorie donnée (insensible à la casse).
 */
function filtrerParCategorie(array $livres, string $categorie): array
{
    $categorieRecherchee = mb_strtolower(trim($categorie));
    $resultat = [];

    foreach ($livres as $livre) {
        if (mb_strtolower($livre['categorie']) === $categorieRecherchee) {
            $resultat[] = $livre;
        }
    }

    return $resultat;
}

/**
 * Recherche un livre précis par son identifiant unique.
 */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ((int) $livre['id'] === $id) {
            return $livre;
        }
    }

    return null;
}

/**
 * Compte le nombre total de livres actuellement disponibles.
 */
function compterLivresDisponibles(array $livres): int
{
    $compteur = 0;

    foreach ($livres as $livre) {
        if (!empty($livre['disponible']) && $livre['disponible'] === true) {
            $compteur++;
        }
    }

    return $compteur;
}
