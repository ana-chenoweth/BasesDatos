<?php
require '../config/db.php';

// Traer objetos y aulas disponibles
$objetos = $pdo->query("
    SELECT id_objeto, nombre 
    FROM Objeto
    ORDER BY nombre
")->fetchAll();

$aulas = $pdo->query("
    SELECT a.id_aula, a.nombre AS nombre_aula, e.nombre AS nombre_edificio
    FROM Aula a
    JOIN Edificio e ON a.id_edificio = e.id_edificio
    ORDER BY e.nombre, a.nombre
")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_objeto = $_POST['id_objeto'];
    $id_aula = $_POST['id_aula'];

    $stmt = $pdo->prepare("INSERT INTO Ejemplar (id_aula, id_objeto) VALUES (:id_aula, :id_objeto)");
    $stmt->execute([
        'id_aula' => $id_aula,
        'id_objeto' => $id_objeto
    ]);
    header("Location: index.php");
    exit;
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
<h2>Nuevo Ejemplar</h2>
<form method="POST">
    Objeto:
    <select name="id_objeto" required>
        <option value="">Seleccione un objeto</option>
        <?php foreach ($objetos as $obj): ?>
            <option value="<?= $obj['id_objeto'] ?>"><?= $obj['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Aula:
    <select name="id_aula" required>
        <option value="">Seleccione un aula</option>
        <?php foreach ($aulas as $a): ?>
            <option value="<?= $a['id_aula'] ?>">
                <?= $a['nombre_aula'] ?> (<?= $a['nombre_edificio'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Guardar</button>
</form>
<a href="index.php">Cancelar</a>
</body>
</html>