<?php
require '../config/db.php';

$edificios = $pdo->query("SELECT nombre, id_edificio FROM Edificio")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id_edificio = $_POST['id_edificio'];

    $stmt = $pdo->prepare("INSERT INTO Aula (nombre, id_edificio) VALUES (:nombre, :id_edificio)");
    $stmt->execute([
        'nombre' => $nombre,
        'id_edificio' => $id_edificio
    ]);

    header("Location: index.php");
    exit;
}
?>


<h2>Nueva Aula</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" required>

    Edificio:
    <select name="id_edificio" required>
        <option value="">Seleccione un edificio</option>
        <?php foreach ($edificios as $edificio): ?>
            <option value="<?= $edificio['id_edificio'] ?>">
                <?= $edificio['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>