<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $stmt = $pdo->prepare("INSERT INTO departamento (nombre) VALUES (:nombre)");
    $stmt->execute(['nombre' => $nombre]);
    header("Location: index.php");
}
?>

<h2>Nuevo Departamento</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" required>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>\