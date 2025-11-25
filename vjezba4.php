<?php

$a = $_GET["a"] ?? 0;
$b = $_GET["b"] ?? 0;


$c = (3 * $a - $b) / 2;
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>vjezba4</title>
</head>
<body>

<form method="get">
    <label>Vrijednost a:</label>
    <input type="number" name="a" step="any" value="<?= $a ?>">
    <br><br>

    <label>Vrijednost b:</label>
    <input type="number" name="b" step="any" value="<?= $b ?>">
    <br><br>

    <button type="submit">Pošalji</button>
</form>
<hr>
<p>a = <?= $a ?></p>
<p>b = <?= $b ?></p>
<p>c = (3 * <?= $a ?> - <?= $b ?>) / 2 = <strong><?= $c ?></strong></p>

</body>
</html>
