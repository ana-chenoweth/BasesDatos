<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM aula");
$aulas = $pdo->query("
    SELECT 
        a.id_aula, 
        a.nombre AS nombre_aula, 
        e.nombre AS nombre_edificio
    FROM Aula a
    JOIN Edificio e ON a.id_edificio = e.id_edificio
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
<h2>Aulas</h2>
<a href="create.php">Nueva Aula</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Edificio</th><th>Acciones</th></tr>
    <?php foreach ($aulas as $a): ?>
        <tr>
            <td><?= $a['id_aula'] ?></td>
            <td><?= $a['nombre_aula'] ?></td>
            <td><?= $a['nombre_edificio'] ?></td>
            <td>
                <a href="edit.php?id=<?= $a['id_aula'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $a['id_aula'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>
</body>
</html>
