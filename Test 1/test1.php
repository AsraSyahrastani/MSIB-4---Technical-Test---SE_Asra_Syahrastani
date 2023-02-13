<?php

function a000124($n) {
    if ($n == 0) {
        return 1;
    } else if ($n % 2 == 0) {
        return a000124($n / 2) + a000124($n / 2 - 1);
    } else {
        return a000124(($n - 1) / 2);
    }
}

$n = readline("Masukkan nilai n: ");
$result = "";
for ($i = 0; $i < $n; $i++) {
    $result .= strval(a000124($i)) . "-";
}
echo "Hasil: " . substr($result, 0, strlen($result) - 1) . "\n";

?>
