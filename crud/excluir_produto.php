<?php
include '../php/autentica_admin.php';
include '../php/conect.php';


$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: listar_produtos.php");
exit();
