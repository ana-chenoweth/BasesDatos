<?php
require '../config/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM aula WHERE id_aula = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "<h3>❌ No se puede eliminar el aula porque tiene ejemplares asociados.</h3>";
    echo "<p>Primero elimina o reubica los ejemplares dentro de esta aula.</p>";
    echo "<a href='index.php'>Volver</a>";
}
