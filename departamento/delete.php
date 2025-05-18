<?php
require '../config/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM departamento WHERE id_departamento = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
} catch (PDOException $e) {
    // Mostrar mensaje amigable si falla por restricción de clave foránea
    echo "<h3>❌ No se puede eliminar el departamento porque tiene edificios asociados.</h3>";
    echo "<p>Primero elimina o reasigna los edificios que pertenecen a este departamento.</p>";
    echo "<a href='index.php'>Volver a la lista</a>";
}
