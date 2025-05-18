<?php
require '../config/db.php';

$id = $_GET['id'];
$edificios = $pdo->query("SELECT nombre, id_edificio FROM edificio")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id_edificio = $_POST['id_edificio'];

    $stmt = $pdo->prepare("UPDATE aula SET nombre = :nombre, id_edificio = :id_edificio WHERE id_aula = :id");
    $stmt->execute([
        'nombre' => $nombre,
        'id_edificio' => $id_edificio,
        'id' => $id
    ]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM aula WHERE id_aula = :id");
    $stmt->execute(['id' => $id]);
    $aula = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
<h2>Editar Aula</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $aula['nombre'] ?>" required>
    Edificio:
    <select name="id_edificio" required>
        <?php foreach ($edificios as $ed): ?>
            <option value="<?= $ed['id_edificio'] ?>" <?= $ed['id_edificio'] == $aula['id_edificio'] ? 'selected' : '' ?>>
                <?= $ed['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Cancelar</a>
</body>
</html>
