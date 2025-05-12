<?php
require '../config/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM departamento WHERE id_departamento = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
