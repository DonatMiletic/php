<!DOCTYPE html>


<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="stil.css">
<title>vjezba7</title>
<style>
</style>
</head>



<body>
<h1>Izračun ocjene iz kolokvija</h1>
 <div class="container">
<form method="POST">
<label for="prvi">Ocijena I kolokvija:</label><br>
<input type="number" id="prvi"name="prvi"  min="1" max="5"><br>
<label for="drugi">Ocijena II kolokvija:</label><br>
<input type="number" id="drugi" name="drugi" min="1" max="5"><br>
<input type="submit" name="gumb" value="POŠALJI">
 </div>
</form>
<div class="rezultat">
<?php 



if (isset($_POST["gumb"])) {
    
$prvi=$_POST["prvi"];
$drugi=$_POST["drugi"];
$ocjene=Array($prvi,$drugi);
$prosjek=($prvi+$drugi)/2;

if($ocjene[0]==1 && $ocjene[1]==1 ){

    echo"<p>Student mora ponavljati oba kolokvija.\nOcjena I. kolokvija je 1.\nOcjena II. kolokvija je 1.</p>";
}
elseif($ocjene[0]==1){
    echo"<p>Ocjena I. kolokvija je 1. Student mora ponavljati I. kolokvij</p>";

}
elseif($ocjene[1]==1){
     echo"<p>Ocjena II. kolokvija je 1. Student mora ponavljati II. kolokvij</p>";
}
else{
    echo"<p>Ocjena I. kolokvija:".$ocjene[0]."</p>";
    echo"<p>Ocjena II. kolokvija:".$ocjene[1]."</p>";
    echo"<hr>";
    echo"<p>Srednja ocjena iz predmeta: ".$prosjek." </p>";
    echo"<p>Konačna ocjena iz predmeta: ".round($prosjek)."</p>";
}

}
?>
 </div>
</body>



</html>
