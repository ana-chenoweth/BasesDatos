<?php
require '../config/db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $stmt = $pdo->prepare("UPDATE categoria SET tipo = :tipo WHERE id_categoria = :id");
    $stmt->execute(['tipo' => $tipo, 'id' => $id]);
    header("Location: index.php");
} else {
    $stmt = $pdo->prepare("SELECT * FROM categoria WHERE id_categoria = :id");
    $stmt->execute(['id' => $id]);
    $cat = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Editar Categoría</h2>
<form method="POST">
    Tipo: <input type="text" name="tipo" value="<?= $cat['tipo'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
