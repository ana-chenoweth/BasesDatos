<?php
$host = "localhost";
$db = "almacen";
$user = "laura";
$password = "laura768";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
