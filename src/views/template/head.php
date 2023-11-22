<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>People</title>
</head>
<style>
  .message {
    padding: 5px;
    margin: 5px;
  }

  .success {
    background-color: lightgreen;
  }

  .error {
    background-color: lightcoral;
  }
</style>

<body>
  <h1>Ejercicio de Gente</h1>
  <nav>
    <ul>
      <li><a href="index.php">Personas</a></li>
      <li><a href="index.php?table=product">Productos</a></li>
    </ul>
  </nav>
  <?php
  if (isset($this->messages)) {
    foreach ($this->messages as $message) {
      $type = $message['type'];
      $text = $message['text'];
      echo "<div class=\"message $type\">$text</div>";
    }
  }
