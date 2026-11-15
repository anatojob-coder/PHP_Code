# Catalogue dynamique « Médiathèque IPNET »

Mini-projet réalisé dans le cadre de l'UE **IT 231 – Développement Web I** (Licence – Semestre 3).

## Description du projet
Application web dynamique développée en **PHP 8+ natif** (sans base de données ni framework) permettant de consulter le catalogue des ouvrages de la médiathèque IPNET, de filtrer les livres par catégorie et d'afficher les informations détaillées de chaque livre.

## Prérequis
* **PHP 8.0 ou supérieur** installé en local (via XAMPP, WAMP, MAMP ou serveur PHP natif).
* Un navigateur web récent.

## Procédure d'installation et de lancement
1. Cloner ou décompresser le dossier `mediatheque-mp1` sur votre machine.
2. Ouvrir un terminal dans le dossier `mediatheque-mp1/`.
3. Lancer le serveur web intégré de PHP avec la commande :
   ```bash
   php -S localhost:8000
   ```
4. Ouvrir un navigateur et accéder à l'adresse : `http://localhost:8000/index.php`.

## Fonctionnalités réalisées
* **Page d'accueil (`index.php`)** : Message de bienvenue, statistiques des livres disponibles et accès rapide au catalogue.
* **Catalogue dynamique (`catalogue.php`)** : Affichage en cartes des ouvrages, compteur d'éléments et filtrage sécurisé par catégorie via paramètre URL (`?categorie=...`).
* **Fiche détaillée (`detail.php`)** : Affichage complet d'un ouvrage via `?id=...` avec validation de l'identifiant et gestion des erreurs.
* **Page À propos (`apropos.php`)** : Présentation de la médiathèque et affichage dynamique de la date du jour en français.
* **Sécurité** : Échappement systématique des données affichées avec `htmlspecialchars()` et validation stricte des paramètres `$_GET`.
