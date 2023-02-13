<?php

// Fungsi untuk mengurutkan skor dari nilai terbesar ke nilai terkecil
function sortScores($scores) {
    $sortedScores = array();
    foreach ($scores as $score) {
        if (!isset($sortedScores[$score])) {
            $sortedScores[$score] = 1;
        } else {
            $sortedScores[$score]++;
        }
    }
    krsort($sortedScores);
    return $sortedScores;
}

// Fungsi untuk menghitung peringkat pemain
function calculateRanking($n, $scores, $m, $playerScores) {
    $sortedScores = sortScores($scores);
    $rankings = array();
    $currentRank = 1;
    $previousScore = -1;
    foreach ($sortedScores as $score => $count) {
        if ($score != $previousScore) {
            $currentRank += $count;
        }
        $previousScore = $score;
        $rankings[$score] = $currentRank;
    }
    $playerRankings = array();
    foreach ($playerScores as $playerScore) {
        if (isset($rankings[$playerScore])) {
            $playerRankings[] = $rankings[$playerScore];
        } else {
            $playerRankings[] = $currentRank + 1;
        }
    }
    return $playerRankings;
}

$n = readline("Masukkan jumlah pemain: ");
$scores = array();
for ($i = 0; $i < $n; $i++) {
    $scores[] = readline("Masukkan skor pemain " . ($i + 1) . ": ");
}
$m = readline("Masukkan jumlah permainan yang diikuti oleh GITS: ");
$playerScores = array();
for ($i = 0; $i < $m; $i++) {
    $playerScores[] = readline("Masukkan skor GITS dalam permainan " . ($i + 1) . ": ");
}
$playerRankings = calculateRanking($n, $scores, $m, $playerScores);
echo "Hasil peringkat: " . implode(" ", $playerRankings) . "\n";

?>
