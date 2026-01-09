<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css">
<style>
    #s{
        color:red;
        background-color: #f3333311;
    }
</style>
</head>

<body>

<h1>Zadatak str_word_count</h1>
<p>U zadatku se traži da se ispiše koliko je riječi u rečenici. koristite naredbu str_word_count</p>

<form method="POST">

<?php 

echo "<label>Ulazni niz: </label><br>";
echo '<input type="text" name="string"><br><br>';
echo '<input type="submit" name="prebroj" value="Ispiši broj riječi"><br><br>';

if (isset($_POST["string"])) {

    $tekst = $_POST["string"];
    $broj = str_word_count($_POST["string"]);

    echo "<p>Ulazni niz: <span id='s'>$tekst</span> sadrži <strong>$broj</strong> riječi.</p>";
}

?>

</form>

</body>
</html>
