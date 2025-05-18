<?php
require '../config/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM Ejemplar WHERE id_ejemplar = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
