<!DOCTYPE html>

<head>

</head>


<body>

<?php


function ducan($stanje = "otvoren") {
    echo "Dučan je trenutno: <strong>$stanje</strong>";
}

$datum = new DateTime();

$dan = $datum->format("N");      
$sati = $datum->format("G");     

echo "<p>Danas je dan u tjednu: " .$datum->format("l") ."</p>";
echo "<p>Trenutno vrijeme: " . $datum->format("H:i") . "</p>";


if ($dan == 7) {
    
    ducan("zatvoren");
}
elseif ($dan == 6) {
    
    if ($sati >= 9 && $sati < 14) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
}
else {

    if ($sati >= 8 && $sati < 20) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
}

?>





</body>
</html>