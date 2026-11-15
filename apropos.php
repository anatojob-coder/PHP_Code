<?php
$titrePage = 'À propos - Médiathèque IPNET';

// Fonction PHP pour formater la date du jour en français
function obtenirDateDuJour(): string
{
    $jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    $mois = [
        1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
        'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
    ];

    $jourSemaine = $jours[(int) date('w')];
    $jourMois = date('d');
    $nomMois = $mois[(int) date('n')];
    $annee = date('Y');

    return "$jourSemaine $jourMois $nomMois $annee";
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="apropos-section">
    <h1>À propos de la Médiathèque IPNET</h1>
    <p class="date-jour">Date du jour : <strong><?= htmlspecialchars(obtenirDateDuJour(), ENT_QUOTES, 'UTF-8') ?></strong></p>

    <div class="bloc-texte">
        <h2>Notre mission</h2>
        <p>
            La Médiathèque de l'institut <strong>IPNET Institute of Technology</strong> accompagne les étudiants des filières 
            GL, WIM, DWM, IG et IA dans leur parcours académique en mettant à leur disposition des ouvrages techniques, 
            scientifiques et littéraires.
        </p>

        <h2>Horaires d'ouverture</h2>
        <ul>
            <li><strong>Lundi au Vendredi :</strong> 08h00 – 19h00</li>
            <li><strong>Samedi :</strong> 09h00 – 14h00</li>
            <li><strong>Dimanche :</strong> Fermé</li>
        </ul>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
