<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun ocjene</title>
    <link rel="stylesheet" type="text/css" href="stil.css">
</head>

<body>
    <h1>Izračun ocjene iz kolokvija</h1>

    <div class="container">
        <form method="POST">
            <label for="prvi">Ocjena I. kolokvija:</label>
            <input type="number" id="prvi" name="prvi" min="1" max="5" required>

            <label for="drugi">Ocjena II. kolokvija:</label>
            <input type="number" id="drugi" name="drugi" min="1" max="5" required>

            <input type="submit" name="gumb" value="POŠALJI">
        </form>
     </div>

    <div class="rezultat">
    <?php 
    if (isset($_POST["gumb"])) {

        $prvi = $_POST["prvi"];
        $drugi = $_POST["drugi"];
        $ocjene = array($prvi, $drugi);
        $prosjek = ($prvi + $drugi) / 2;

        if ($prvi == 1 && $drugi == 1) {
            echo "<p>Student mora ponavljati oba kolokvija.</p>";
            echo "<p>Konačna ocjena iz predmeta: 1</p>";
        }
        elseif ($prvi == 1) {
            echo "<p>Ocjena I. kolokvija je negativna.</p>";
            echo "<p>Konačna ocjena iz predmeta: 1</p>";
        }
        elseif ($drugi == 1) {
            echo "<p>Ocjena II. kolokvija je negativna.</p>";
            echo "<p>Konačna ocjena iz predmeta: 1</p>";
        }
        else {
            echo "<p>Ocjena I. kolokvija: $prvi</p>";
            echo "<p>Ocjena II. kolokvija: $drugi</p>";
            echo "<hr>";
            echo "<p>Srednja ocjena iz predmeta: $prosjek</p>";
            echo "<p>Konačna ocjena iz predmeta: ". round($prosjek) ."</p>";
            echo"<hr>";
        }
    }
    ?>
    </div>

</body>
</html>
