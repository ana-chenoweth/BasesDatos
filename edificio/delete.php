<?php
require '../config/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM edificio WHERE id_edificio = :id");
$stmt->execute(['id' => $id]);


header("Location: index.php");
