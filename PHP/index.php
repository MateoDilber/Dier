<?php
require_once 'Dier.php';
require_once 'Asiel.php';

// Simpele demo dieren array (later uit DB)
$asiel1 = new Asiel(1, "Liefdevol Thuis", "Utrecht", "info@liefdevolthuis.nl");
$dier1 = new Dier(1, "Bella", "Hond", "Labrador", 3, $asiel1, "Lieve en speelse hond.");
$dier2 = new Dier(2, "Milo", "Kat", "Europees Korthaar", 2, $asiel1, "Rustige kater.");

$dieren = [$dier1, $dier2];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title>Home - Liefdevol Thuis</title>
</head>
<body>
    <h1>Welkom bij Liefdevol Thuis</h1>
    <p>Unieke dating-app voor huisdieren en adoptanten.</p>

    <h2>Beschikbare dieren</h2>
    <ul>
    <?php foreach ($dieren as $dier): ?>
        <li>
            <strong><?= htmlspecialchars($dier->naam) ?></strong> - <?= htmlspecialchars($dier->soort) ?>,
            <?= htmlspecialchars($dier->ras) ?>, <?= $dier->leeftijd ?> jaar<br>
            <?= htmlspecialchars($dier->beschrijving) ?><br>
            Asiel: <?= htmlspecialchars($dier->asiel->naam) ?>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
