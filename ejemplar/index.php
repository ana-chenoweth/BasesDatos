<?php
require '../config/db.php';

$ejemplares = $pdo->query("
    SELECT 
        e.id_ejemplar,
        o.nombre AS nombre_objeto,
        a.nombre AS nombre_aula,
        ed.nombre AS nombre_edificio
    FROM Ejemplar e
    JOIN Objeto o ON e.id_objeto = o.id_objeto
    JOIN Aula a ON e.id_aula = a.id_aula
    JOIN Edificio ed ON a.id_edificio = ed.id_edificio
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
<h2>Ejemplares</h2>
<a href="create.php">Nuevo Ejemplar</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Objeto</th>
        <th>Aula</th>
        <th>Edificio</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($ejemplares as $e): ?>
        <tr>
            <td><?= $e['id_ejemplar'] ?></td>
            <td><?= $e['nombre_objeto'] ?></td>
            <td><?= $e['nombre_aula'] ?></td>
            <td><?= $e['nombre_edificio'] ?></td>
            <td>
                <a href="edit.php?id=<?= $e['id_ejemplar'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $e['id_ejemplar'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>
</body>
</html>