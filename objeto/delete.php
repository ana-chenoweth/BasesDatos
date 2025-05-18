<?php
require '../config/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM objeto WHERE id_objeto = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "<h3>❌ No se puede eliminar el objeto porque está siendo utilizado por ejemplares.</h3>";
    echo "<p>Primero elimina los ejemplares que hacen referencia a este objeto.</p>";
    echo "<a href='index.php'>Volver</a>";
}
