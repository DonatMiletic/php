<!DOCTYPE html>
<head>
<title>vjezba5</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <h1>Igra (pogodi broj)</h1>
 
    <form action="" method="POST">
    <label for="number">Upiši jedan broj od 1 do 9*</label>
    <input type="number" name="number" id="number" required>
    <br>
  
    </form>
<?php

$brojBot=rand(1,9);

if(isset($_POST["number"])){
    if($_POST["number"]==$brojBot){
        echo '<p style="color:green;">Pogodak, probaj ponovno!</p>';
    }
    else{
        print '<p style="color:red;">Krivo, probaj ponovno!</p>';
    }
     echo '<h3>Zamišljeni broj je bio '.$brojBot.'</h3>';

}


?>

</body>

</html> 