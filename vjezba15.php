<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Tražilica korisnika</title>
</head>
<body>

<h2>Pretraži korisnika</h2>

<form method="post" action="search.php">
    <input type="text" name="search" placeholder="Unesite ime ili prezime">
    <button type="submit">Traži</button>
</form>

</body>
</html>
<?php

$con = mysqli_connect("localhost", "root", "", "vjezba14");


if (!$con) {
    die("Greška pri spajanju na bazu: " . mysqli_connect_error());
}

if (isset($_POST['search'])) {

    $unos = $_POST['search'];

    $query = "
        SELECT name, lastname 
        FROM users 
        WHERE name LIKE '%$unos%' 
        OR lastname LIKE '%$unos%'
    ";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {

        echo "<h3>Rezultati pretrage:</h3>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['name'] . " " . $row['lastname'] . "</p>";
        }

    } else {
        echo "<p>Nema rezultata.</p>";
    }
}
mysqli_close($con);
?>
