<?php
/**
 * Nettoie une chaîne pour l'afficher sans risque (protection XSS).
 *
 * @param string $string
 * @return string
 */
function sanitize(string $string): string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Retourne le nombre total de questions.
 *
 * @param array $questions
 * @return int
 */
function getTotalQuestions(array $questions): int {
    return count($questions);
}

/**
 * Vérifie si une réponse est correcte.
 *
 * @param int $userAnswerIndex
 * @param int $correctAnswerIndex
 * @return bool
 */
function isCorrect(int $userAnswerIndex, int $correctAnswerIndex): bool {
    return $userAnswerIndex === $correctAnswerIndex;
}