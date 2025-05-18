<?php
require '../config/db.php';

$departamentos = $pdo->query("SELECT id_departamento, nombre FROM Departamento")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id_departamento = $_POST['id_departamento'];

    $stmt = $pdo->prepare("INSERT INTO edificio (nombre, id_departamento) VALUES (:nombre, :id_departamento)");
    $stmt->execute([
        'nombre' => $nombre,
        'id_departamento' => $id_departamento
    ]);
    
    header("Location: index.php");
    exit;
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
<h2>Nuevo Edificio</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" required>

    Departamento:
    <select name="id_departamento" required>
        <option value="">Seleccione un departamento</option>
        <?php foreach ($departamentos as $departamento): ?>
            <option value="<?= $departamento['id_departamento'] ?>">
                <?= $departamento['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>
</body>
</html>