<?php
require "../vendor/autoload.php";
require "../src/utils/connection.php";

use Adexe\People\Models\Person;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Gentes</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach (Person::all() as $person) {
      ?>
        <tr>
          <td><?= $person->id ?></td>
          <td><?= $person->name ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</body>

</html>