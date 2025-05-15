<?php
session_start();
require 'header.php';

// Je récupère le score depuis la session
$score = $_SESSION['score'] ?? 0;
$total = 5; 

// Message personnalisé selon le score
if ($score === 5) {
    $message = "Tu es un vrai survivor ! Tu pourrais mener une tribu !!!";
} elseif ($score >= 3) {
    $message = "Pas mal ! Tu ne mourras pas tout de suite… mais tu ne sauveras pas la civilisation ! ";
} elseif ($score >= 1) {
    $message = "Espérance de vie inférieur à 3 jours, il faut te former !";
} else {
    $message = "Désolé… T’as confondu l’apocalypse avec Koh-Lanta. Paix à ton ame !";
}

// Je détruit la session pour pouvoir rejouer en partant de 0
session_destroy();
?>

<main>
    <h2>Résultat du quizz</h2>
    <p>Score : <strong><?= $score ?> / <?= $total ?></strong></p>
    <p><?= $message ?></p>

    <br>
    <a href="index.php"><button>Tu veux retenter ?</button></a>
</main>

<?php require 'footer.php'; ?>