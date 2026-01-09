<!DOCTYPE html>

<head>

</head>


<body>
    <p>Označi vozilo: </p>
    <form method="POST">

<?php 
$cars = array("Audi", "BMW", "Renault", "Citroen");

foreach($cars as $car){
echo"<label>";
echo '<br><input type="radio" name="vozilo" value="' . $car . '"> ' . $car;
echo"</label>";

}




?>
<br>
<input type="submit" value="POŠALJI">
<hr>

<?php

if (isset($_POST["vozilo"])) {
    $odabrano = $_POST["vozilo"];
    echo "<p>Odabrali ste vozilo: <strong>$odabrano</strong></p>";
}
?>
 </form>
</body>

</html>