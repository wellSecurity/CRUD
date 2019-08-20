<?php

$id = $_POST['id1'];
$cpf = $_POST['cpf1'];
$cep = $_POST['cep1'];
$tel = $_POST['tel1'];
$nome = $_POST['nome1'];

$mysqli = new mysqli("localhost", "root", "", "crud");
$stmt = $mysqli->prepare("update tb_clientes SET nome = ?, cpf = ?, cep = ?, tel = ? where id = ?");
$stmt->bind_param("sssss", $nome, $cpf, $cep, $tel, $id);
$stmt->execute();
header("Location:users.php");

?>