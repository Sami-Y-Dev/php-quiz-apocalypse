<?php
session_start();
require 'data.php';
require 'functions.php';
require 'templates/header.php';

// Initialisation pour la première question
if (!isset($_GET['q'])) {
    $_SESSION['score'] = 0;
    header("Location: question.php?q=0");
    exit();
}

$index = (int)$_GET['q'];

// Vérifie la réponse précédente si ce sont les questions suivantes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer']) && isset($questions[$index - 1])) {
        $selected = (int)$_POST['answer'];
        $correct = $questions[$index - 1]['answer'];
        if ($selected === $correct) {
            $_SESSION['score']++;
        }
    }
}

// Si fini toutes les questions
if ($index >= count($questions)) {
    header("Location: result.php");
    exit();
}

// Récupère la question actuelle
$current_question = $questions[$index];
?>

<main>
    <h2>Question <?= $index + 1 ?> / <?= count($questions) ?></h2>
    <form method="POST" action="question.php?q=<?= $index + 1 ?>">
        <p><?= htmlspecialchars($current_question['question']) ?></p>
        <?php foreach ($current_question['options'] as $key => $option): ?>
            <label>
                <input type="radio" name="answer" value="<?= $key ?>" required>
                <?= htmlspecialchars($option) ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Valider</button>
    </form>
</main>

<?php require 'templates/footer.php'; ?>