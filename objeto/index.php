<?php
require '../config/db.php';

# $stmt = $pdo->query("SELECT * FROM objeto");
$objetos = $pdo->query("
    SELECT 
        o.id_objeto, 
        o.nombre AS nombre_objeto,
        o.descripcion AS descripcion_objeto, 
        c.tipo AS tipo_categoria
    FROM Objeto o
    JOIN Categoria c ON o.id_categoria = c.id_categoria
")->fetchAll();
?>

<h2>Objetos</h2>
<a href="create.php">Nuevo Objeto</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>descripción</th>
        <th>Cateogoría</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($objetos as $o): ?>
    <tr>
        <td><?= $o['id_objeto'] ?></td>
        <td><?= $o['nombre_objeto'] ?></td>
        <td><?= $o['descripcion_objeto'] ?></td>
        <td><?= $o['tipo_categoria'] ?></td>
        <td>
            <a href="edit.php?id=<?= $o['id_objeto'] ?>">Editar</a> |
            <a href="delete.php?id=<?= $o['id_objeto'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>