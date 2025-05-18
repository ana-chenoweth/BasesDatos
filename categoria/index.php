<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM categoria");
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>

<h2>Categorías</h2>
<a href="create.php">Nueva Categoría</a>
<table border="1">
    <tr><th>ID</th><th>Tipo</th><th>Acciones</th></tr>
    <?php foreach ($categorias as $c): ?>
        <tr>
            <td><?= $c['id_categoria'] ?></td>
            <td><?= $c['tipo'] ?></td>
            <td>
                <a href="edit.php?id=<?= $c['id_categoria'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $c['id_categoria'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Volver</a>
</body>
</html>
