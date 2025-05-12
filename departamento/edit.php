<?php
require '../config/db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $stmt = $pdo->prepare("UPDATE departamento SET nombre = :nombre WHERE id_departamento = :id");
    $stmt->execute(['nombre' => $nombre, 'id' => $id]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM departamento WHERE id_departamento = :id");
    $stmt->execute(['id' => $id]);
    $dep = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Editar Departamento</h2>
<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $dep['nombre'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
