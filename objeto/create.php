<?php
require '../config/db.php';

$categorias = $pdo->query("SELECT id_categoria, tipo FROM Categoria")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'];

    $stmt = $pdo->prepare("INSERT INTO objeto (nombre, descripcion, id_categoria) VALUES (:nombre, :descripcion, :id_categoria)");
    $stmt->execute([
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'id_categoria' => $id_categoria
    ]);
    
    header("Location: index.php");
    exit;
}
?>

<h2>Nuevo Objeto</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" required>
    Descripción: <input type="text" name="descripcion" required>

    Categoría:
    <select name="id_categoria" required>
        <option value="">Seleccione una categoría.</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id_categoria'] ?>">
                <?= $categoria['tipo'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>\