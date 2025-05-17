<?php
require '../config/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM aula WHERE id_aula = :id");
$stmt->execute(['id' => $id]);


header("Location: index.php");
