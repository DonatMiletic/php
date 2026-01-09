<form method="POST">
    <label>Je li broj prost? </label><br>
    <input type="number" name="number"><br>
    <input type="submit" name="gumb" value="PROVJERI"><br>
</form>

<?php
function jeProst($broj) {
    if ($broj <= 1) {
        return false; 
    }
    for ($i = 2; $i <= sqrt($broj); $i++) {
        if ($broj % $i == 0) {
            return false;
        }
    }
    return true; 
}

if (isset($_POST['gumb'])) {
    $broj = intval($_POST['number']); 
    if (jeProst($broj)) {
        echo "<p>Broj $broj je prost.</p>";
    } else {
        echo "<p>Broj $broj nije prost.</p>";
    }
}
echo "<h3>Prosti brojevi od 1 do 100:</h3>";
for ($n = 2; $n <= 100; $n++) {
    if (jeProst($n)) {
        echo $n . " ";
    }
}
?>
