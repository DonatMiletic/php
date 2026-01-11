<?php
$MySQL = mysqli_connect("localhost","root","","vjezba17") or die("DB connect error: " . mysqli_connect_error());

$query = "
  SELECT 
    u.id,
    u.user_firstname,
    u.user_lastname,
    u.country_code,
    c.country_name
  FROM users u
  LEFT JOIN countries c ON c.country_code = u.country_code
  ORDER BY u.id
";
$result = mysqli_query($MySQL, $query) or die("Query error: " . mysqli_error($MySQL));
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <title>Vježba 18 - Lista korisnika i edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h1 class="mb-3">Lista korisnika (JOIN users + countries)</h1>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Država</th>
          <th>Akcija</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= (int)$row["id"] ?></td>
            <td><?= htmlspecialchars($row["user_firstname"]) ?></td>
            <td><?= htmlspecialchars($row["user_lastname"]) ?></td>
            <td>
              <?= $row["country_name"] ? htmlspecialchars($row["country_name"]) : "<span class='text-muted'>Nije odabrano</span>" ?>
            </td>
            <td style="width:120px;">
              <a class="btn btn-sm btn-primary" href="edit_user.php?id=<?= (int)$row["id"] ?>">Edit</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
