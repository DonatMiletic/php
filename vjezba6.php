<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vježba6</title>
</head>



<body>
<form method="POST">
    <label>Kalkulator (Switch naredba)</label><br><br>
    <label name="prviBroj"><strong>Upiši prvi broj*</strong></label><br>
    <input type="number" name="prvi" required><br>
    <label name="prviBroj"><strong>Upiši drugi broj*</strong></label><br>
    <input type="number" name="drugi" required><br><br>
    <input type="submit" value="+" name="operator">
    <input type="submit" value="-" name="operator">
    <input type="submit" value="*" name="operator">
    <input type="submit" value="/" name="operator">

</form>
<?php 
switch($_POST["operator"]){
case "+":
   echo '<p>Rezultat:'. ($_POST["prvi"]+$_POST["drugi"]).'</p>';
    break;
case"-":
     echo '<p>Rezultat:'. ($_POST["prvi"]-$_POST["drugi"]).'</p>';
    break;
case"*":
     echo '<p>Rezultat:'. ($_POST["prvi"]*$_POST["drugi"]).'</p>';
    break;
case"/":
     echo '<p>Rezultat:'. ($_POST["prvi"]/$_POST["drugi"]).'</p>';
    break;


}

?>

