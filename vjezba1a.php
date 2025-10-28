<?php
$naslov="Moj prvi php dokument";
$autor="Donat Miletić";
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
    <meta charset="UTF-8">
    <title><?php echo $naslov; ?></title>
</head>
<body>
<?php
echo "<h1>$naslov</h1>";
echo "<p>Ovu stranicu izradio/izradila je <strong>$autor</strong></p>";
echo '<a href="https://www.youtube.com/watch?v=D11A1derBKU"target="_blank">Posjeti ovaj yt video</a>';
?>
</body>
</html>
<!--Naziv datoteke vjezba1a.php -->