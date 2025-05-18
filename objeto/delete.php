<?php
require '../config/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM objeto WHERE id_objeto = :id");
$stmt->execute(['id' => $id]);


header("Location: index.php");
