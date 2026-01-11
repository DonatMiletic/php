<?php
$MySQL = mysqli_connect("localhost","root","","vjezba17") or die("DB connect error: " . mysqli_connect_error());

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
if ($id <= 0) die("Neispravan ID korisnika.");

$errors = [];
$success = "";

$qUser = "SELECT id, user_firstname, user_lastname, country_code FROM users WHERE id = $id";
$rUser = mysqli_query($MySQL, $qUser) or die("Query error: " . mysqli_error($MySQL));
$user = mysqli_fetch_assoc($rUser);
if (!$user) die("Korisnik ne postoji.");

$qCountries = "SELECT country_code, country_name FROM countries ORDER BY country_name";
$rCountries = mysqli_query($MySQL, $qCountries) or die("Query error: " . mysqli_error($MySQL));
$countries = [];
while ($c = mysqli_fetch_assoc($rCountries)) $countries[] = $c;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = trim($_POST["user_firstname"] ?? "");
    $lastname  = trim($_POST["user_lastname"] ?? "");
    $country_code = trim($_POST["country_code"] ?? "");

    if ($firstname === "") $errors[] = "Ime je obavezno.";
    if ($lastname === "")  $errors[] = "Prezime je obavezno.";

    if ($country_code !== "") {
        $country_code_safe = mysqli_real_escape_string($MySQL, $country_code);
        $check = mysqli_query($MySQL, "SELECT 1 FROM countries WHERE country_code = '$country_code_safe' LIMIT 1");
        if (mysqli_num_rows($check) === 0) {
            $errors[] = "Odabrana država ne postoji.";
        }
    }

    if (!$errors) {
        $firstname_safe = mysqli_real_escape_string($MySQL, $firstname);
        $lastname_safe  = mysqli_real_escape_string($MySQL, $lastname);

        $country_save = ($country_code === "") ? "" : mysqli_real_escape_string($MySQL, $country_code);

        $qUpdate = "
          UPDATE users
          SET user_firstname = '$firstname_safe',
              user_lastname  = '$lastname_safe',
              country_code   = '$country_save'
          WHERE id = $id
        ";
        mysqli_query($MySQL, $qUpdate) or die("Update error: " . mysqli_error($MySQL));

        $success = "Uspješno spremljeno.";
        $user["user_firstname"] = $firstname;
        $user["user_lastname"] = $lastname;
        $user["country_code"] = $country_save;
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <title>Edit korisnika</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h1 class="mb-3">Edit korisnika #<?= (int)$user["id"] ?></h1>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <?php if ($errors): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" class="card p-3" style="max-width: 600px;">
    <div class="mb-3">
      <label class="form-label">Ime</label>
      <input class="form-control" type="text" name="user_firstname" value="<?= htmlspecialchars($user["user_firstname"]) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Prezime</label>
      <input class="form-control" type="text" name="user_lastname" value="<?= htmlspecialchars($user["user_lastname"]) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Država</label>
      <select class="form-select" name="country_code">
        <option value="">-- nije odabrano --</option>
        <?php foreach($countries as $c): ?>
          <option value="<?= htmlspecialchars($c["country_code"]) ?>"
            <?= ($user["country_code"] === $c["country_code"]) ? "selected" : "" ?>>
            <?= htmlspecialchars($c["country_name"]) ?> (<?= htmlspecialchars($c["country_code"]) ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-primary" type="submit">Spremi</button>
      <a class="btn btn-secondary" href="vjezba17.php">Natrag</a>
    </div>
  </form>
</div>
</body>
</html>
