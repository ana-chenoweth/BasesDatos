<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $stmt = $pdo->prepare("INSERT INTO categoria (tipo) VALUES (:tipo)");
    $stmt->execute(['tipo' => $tipo]);
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

<h2>Nueva Categoría</h2>
<form method="POST">
    Tipo: <input type="text" name="tipo" required>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>\
</body>
</html>
