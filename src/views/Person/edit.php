<form action="index.php?action=update&id=<?= $id ?>" method="post">
  <p>
    <input type="text" name="name" value="<?= $people->name ?>">
    <input type="submit" value="Actualizar">
  </p>
</form>