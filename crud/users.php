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
            <a href="home.php" class="nav-link">Home</a>
            <a href="adduser.php" class="nav-link">Adicionar Usuario</a>
            <a href="users.php" class="nav-link active">Usuarios</a>
            <a href="exit.php" class="nav-link">Log Off</a>
        </div>
    </nav>
    <div id="main" class="container-fluid">
        <!--começo-->
        <h3 class="page-header">Usuarios</h3>
        <hr/>
        <!--meio-->
        <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">cpf</th>
                <th scope="col">cep</th>
                <th scope="col">tel</th>
            </tr>

        </thead>
        <tbody>
        <?php
            $mysqli = new mysqli("localhost", "root", "", "crud");
            $stmt = $mysqli->prepare('select * from tb_clientes');
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = mysqli_fetch_array($result)) {
                echo "<form method='POST' action='alterar.php'>";
                //formularios hidden para alterar;
                echo "<input type='hidden' name='nid' value=".$row['id'].">";
                echo "<input type='hidden' name='nnome' value=".$row['nome'].">";
                echo "<input type='hidden' name='ncpf' value=".$row['cpf'].">";
                echo "<input type='hidden' name='ncep' value=".$row['cep'].">";
                echo "<input type='hidden' name='ntel' value=".$row['tel'].">";
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['cpf']."</td>";
                echo "<td>".$row['cep']."</td>";
                echo "<td>".$row['tel']."</td>";
                echo "<td><button class='btn btn-primary' name='edit'>Edit</button></td>";
                echo "<td><button class='btn btn-danger' name='delete'>Delete</button></td>";
                echo "</tr>";
                echo "</form>";
            }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>