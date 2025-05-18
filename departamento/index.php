<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM departamento");
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Departamentos</h2>
<a href="create.php">Nuevo Departamento</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
    <?php foreach ($departamentos as $d): ?>
        <tr>
            <td><?= $d['id_departamento'] ?></td>
            <td><?= $d['nombre'] ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id_departamento'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $d['id_departamento'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>