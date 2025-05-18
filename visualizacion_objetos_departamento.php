<?php
require 'config/db.php';

$query = "
SELECT 
    d.nombre AS departamento,
    ed.nombre AS edificio,
    a.nombre AS aula,
    o.nombre AS objeto,
    o.descripcion,
    c.tipo AS categoria
FROM Departamento d
JOIN Edificio ed ON d.id_departamento = ed.id_departamento
JOIN Aula a ON ed.id_edificio = a.id_edificio
JOIN Ejemplar e ON a.id_aula = e.id_aula
JOIN Objeto o ON e.id_objeto = o.id_objeto
JOIN Categoria c ON o.id_categoria = c.id_categoria
ORDER BY d.nombre, ed.nombre, a.nombre;
";

$resultado = $pdo->query($query)->fetchAll();
?>

<h2>Objetos por Departamento</h2>
<table border="1">
    <tr>
        <th>Departamento</th>
        <th>Edificio</th>
        <th>Aula</th>
        <th>Objeto</th>
        <th>Descripción</th>
        <th>Categoría</th>
    </tr>
    <?php foreach ($resultado as $fila): ?>
        <tr>
            <td><?= $fila['departamento'] ?></td>
            <td><?= $fila['edificio'] ?></td>
            <td><?= $fila['aula'] ?></td>
            <td><?= $fila['objeto'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td><?= $fila['categoria'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="index.php">Volver al inicio</a>
