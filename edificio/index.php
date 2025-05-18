<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM edificio");
$edificios = $pdo->query("
    SELECT 
        e.id_edificio, 
        e.nombre AS nombre_edificio, 
        d.nombre AS nombre_departamento 
    FROM Edificio e
    JOIN Departamento d ON e.id_departamento = d.id_departamento
")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
<h2>Edificios</h2>
<a href="create.php">Nuevo Edificio</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Departamento</th><th>Acciones</th></tr>
    <?php foreach ($edificios as $e): ?>
        <tr>
            <td><?= $e['id_edificio'] ?></td>
            <td><?= $e['nombre_edificio'] ?></td>
            <td><?= $e['nombre_departamento'] ?></td>
            <td>
                <a href="edit.php?id=<?= $e['id_edificio'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $e['id_edificio'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>
</body>
</html>