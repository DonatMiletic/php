<?php

$naslov = "PHP dokument — vježba 3";
$autor = "Ovu stranicu izradio/la je Donat Miletić.";
$opis = "Ova stranica nadograđuje vježbu 1c: biramo temu (dark/light), odabiremo sliku i po želji prikazujemo opis.";

$tema = isset($_GET['tema']) && $_GET['tema'] === 'light' ? 'light' : 'dark';
$slika = isset($_GET['slika']) && in_array($_GET['slika'], ['php', 'server', 'code']) ? $_GET['slika'] : 'php';
$prikaziOpis = isset($_GET['opis']);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $naslov; ?></title>
    <style>
        body {
            background-color: <?php echo $tema === 'dark' ? '#121212' : '#f0f0f0'; ?>;
            font-family: Arial, sans-serif;
            color: <?php echo $tema === 'dark' ? '#ffffff' : '#000000'; ?>;
            margin: 0;
            padding: 20px;
        }
        .kartica {
            background-color: <?php echo $tema === 'dark' ? '#1e1e1e' : '#ffffff'; ?>;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            max-width: 600px;
            margin: auto;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        .gumb {
            background-color: <?php echo $tema === 'dark' ? '#333333' : '#dddddd'; ?>;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        .gumb:hover {
            background-color: <?php echo $tema === 'dark' ? '#555555' : '#cccccc'; ?>;
        }
    </style>
</head>
<body>
    <div class="kartica">
        <h1><?php echo $naslov; ?></h1>
        <p><?php echo $autor; ?></p>
        <img src="img/<?php echo $slika; ?>.png" alt="Odabrana slika">
        <?php if ($prikaziOpis): ?>
            <p><?php echo $opis; ?></p>
        <?php endif; ?>

        <form method="get">
            <h3>Odaberi temu</h3>
            <label><input type="radio" name="tema" value="dark" <?php if ($tema === 'dark') echo 'checked'; ?>> Dark</label>
            <label><input type="radio" name="tema" value="light" <?php if ($tema === 'light') echo 'checked'; ?>> Light</label>

            <h3>Odaberi sliku</h3>
            <select name="slika">
                <option value="php" <?php if ($slika === 'php') echo 'selected'; ?>>PHP</option>
                <option value="server" <?php if ($slika === 'server') echo 'selected'; ?>>Server</option>
                <option value="code" <?php if ($slika === 'code') echo 'selected'; ?>>Code</option>
            </select>

            <h3>Prikaži opis</h3>
            <label><input type="checkbox" name="opis" <?php if ($prikaziOpis) echo 'checked'; ?>> Prikaži opis</label><br><br>

            <button type="submit" class="gumb">Primijeni odabir</button>
            <a href="vjezba2b.php" class="gumb">Natrag na vježba 1c(2b)</a>
        </form>
    </div>
</body>
</html>
<!-- vjezba1d.php/ vjezba3.php -->
