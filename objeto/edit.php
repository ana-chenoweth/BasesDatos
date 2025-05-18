<?php
require '../config/db.php';

$id = $_GET['id'];
$categorias = $pdo->query("SELECT id_categoria, tipo FROM Categoria")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'];

    $stmt = $pdo->prepare("UPDATE objeto SET nombre = :nombre, descripcion = :descripcion, id_categoria = :id_categoria WHERE id_objeto = :id");
    $stmt->execute([
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'id_categoria' => $id_categoria,
        'id' => $id
    ]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM objeto WHERE id_objeto = :id");
    $stmt->execute(['id' => $id]);
    $objeto = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Editar Objeto</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $objeto['nombre'] ?>" required>
    Descripción: <input type="text" name="descripcion" value="<?= $objeto['descripcion'] ?>" required>
    Categoría:
    <select name="id_categoria" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id_categoria'] ?>" <?= $cat['id_categoria'] == $objeto['id_categoria'] ? 'selected' : '' ?>>
                <?= $cat['tipo'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Cancelar</a>
