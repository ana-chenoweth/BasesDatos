<?php
require '../config/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM categoria WHERE id_categoria = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
