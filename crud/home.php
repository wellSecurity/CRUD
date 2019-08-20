<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Crud</a>
        <a class="navbar-brand" href="#"><?php echo $_SESSION['login']; ?></a>

        <div class="navbar">
            <a href="home.php" class="nav-link active">Home</a>
            <a href="adduser.php" class="nav-link">Adicionar Usuario</a>
            <a href="users.php" class="nav-link">Usuarios</a>
            <a href="exit.php" class="nav-link">Log Off</a>
        </div>
    </nav>
    <div id="main" class="container-fluid">
        <!--começo-->
        <h3 class="page-header">Home</h3>
        <hr/>
        <!--meio-->

</body>
</html>