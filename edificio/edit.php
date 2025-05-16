<?php
require '../config/db.php';

$id = $_GET['id'];
$departamentos = $pdo->query("SELECT id_departamento, nombre FROM departamento")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id_departamento = $_POST['id_departamento'];

    $stmt = $pdo->prepare("UPDATE edificio SET nombre = :nombre, id_departamento = :id_departamento WHERE id_edificio = :id");
    $stmt->execute([
        'nombre' => $nombre,
        'id_departamento' => $id_departamento,
        'id' => $id
    ]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM edificio WHERE id_edificio = :id");
    $stmt->execute(['id' => $id]);
    $edificio = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Editar Edificio</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $edificio['nombre'] ?>" required>
    Departamento:
    <select name="id_departamento" required>
        <?php foreach ($departamentos as $dep): ?>
            <option value="<?= $dep['id_departamento'] ?>" <?= $dep['id_departamento'] == $edificio['id_departamento'] ? 'selected' : '' ?>>
                <?= $dep['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Cancelar</a>