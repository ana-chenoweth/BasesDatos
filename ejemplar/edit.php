<?php
require '../config/db.php';

$id = $_GET['id'];

$objetos = $pdo->query("SELECT id_objeto, nombre FROM Objeto ORDER BY nombre")->fetchAll();
$aulas = $pdo->query("
    SELECT a.id_aula, a.nombre AS nombre_aula, e.nombre AS nombre_edificio
    FROM Aula a
    JOIN Edificio e ON a.id_edificio = e.id_edificio
")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_objeto = $_POST['id_objeto'];
    $id_aula = $_POST['id_aula'];

    $stmt = $pdo->prepare("UPDATE Ejemplar SET id_aula = :id_aula, id_objeto = :id_objeto WHERE id_ejemplar = :id");
    $stmt->execute([
        'id_aula' => $id_aula,
        'id_objeto' => $id_objeto,
        'id' => $id
    ]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM Ejemplar WHERE id_ejemplar = :id");
    $stmt->execute(['id' => $id]);
    $ejemplar = $stmt->fetch(PDO::FETCH_ASSOC);
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
<h2>Editar Ejemplar</h2>
<form method="POST">
    Objeto:
    <select name="id_objeto" required>
        <?php foreach ($objetos as $obj): ?>
            <option value="<?= $obj['id_objeto'] ?>" <?= $obj['id_objeto'] == $ejemplar['id_objeto'] ? 'selected' : '' ?>>
                <?= $obj['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    Aula:
    <select name="id_aula" required>
        <?php foreach ($aulas as $a): ?>
            <option value="<?= $a['id_aula'] ?>" <?= $a['id_aula'] == $ejemplar['id_aula'] ? 'selected' : '' ?>>
                <?= $a['nombre_aula'] ?> (<?= $a['nombre_edificio'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Cancelar</a>
</body>
</html>