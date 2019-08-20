<?php
session_start();
$login = $_POST['login'];
$pass = $_POST['pass'];

$mysqli = new mysqli("localhost", "root", "", "crud");
$stmt = $mysqli->prepare("SELECT * FROM tb_login where login = ? && pass = ?");
$stmt->bind_param("ss", $login, $pass);
$stmt->execute();
$resultado = $stmt->get_result();
$newResultado = mysqli_fetch_assoc($resultado);
if(isset($newResultado)) {
    $_SESSION['login'] = $login;
    header("Location:home.php");
}
else {
    header("Location:index.php");
}
?>