<?php
require '../config/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM categoria WHERE id_categoria = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "<h3>❌ No se puede eliminar la categoría porque tiene objetos asociados.</h3>";
    echo "<p>Primero elimina o cambia la categoría de los objetos correspondientes.</p>";
    echo "<a href='index.php'>Volver</a>";
}
