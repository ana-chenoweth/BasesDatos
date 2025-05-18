<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $stmt = $pdo->prepare("INSERT INTO departamento (nombre) VALUES (:nombre)");
    $stmt->execute(['nombre' => $nombre]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
<h2>Nuevo Departamento</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" required>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>
</body>
</html>