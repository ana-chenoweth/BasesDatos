<?php
require '../config/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM edificio WHERE id_edificio = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "<h3>❌ No se puede eliminar el edificio porque tiene aulas asociadas.</h3>";
    echo "<p>Primero elimina o mueve las aulas de este edificio.</p>";
    echo "<a href='index.php'>Volver</a>";
}
