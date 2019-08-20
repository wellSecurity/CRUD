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
    <!--import-->
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Crud</a>
        <a class="navbar-brand" href="#"><?php echo $_SESSION['login']; ?></a>

        <div class="navbar">
            <a href="home.php" class="nav-link">Home</a>
            <a href="adduser.php" class="nav-link active">Adicionar Usuario</a>
            <a href="users.php" class="nav-link">Usuarios</a>
            <a href="exit.php" class="nav-link">Log Off</a>
        </div>
    </nav>
    <div id="main" class="container-fluid">
        <!--começo-->
        <h3 class="page-header">Adicionar Usuario</h3>
        <hr/>
        <!--meio-->

        <form class="form-inline" method="POST">
          <div class="form-group mx-2 mb-3">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="Seu Nome Aqui">
          </div>

          <div class="form-group mx-2 mb-3">
              <label>CPF</label>
              <input id="cpf" class="form-control" type="text" name="cpf" placeholder="Seu CPF Aqui">
          </div>
            
            <div class="form-group mx-2 mb-3">
                <label>CEP</label>
                <input id="cep" class="form-control" type="text" name="cep" placeholder="Seu CEP Aqui">
            </div>

            <div class="form-group mx-2 mb-3">
                <label>Tel</label>
                <input id="tel" class="form-control" type="text" name="tel" placeholder="Seu Telefone Aqui">
            </div>

        <!--Final-->
                <!-- area de campos do form -->
                  <div id="actions" class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" name="btn">Salvar</button>
                      <a href="home.php" class="btn btn-default">Cancelar</a>
                    </div>
                  </div>
            </form>
        <!--php-->
        <?php
          if(isset($_POST['btn'])) {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $cep = $_POST['cep'];
            $tel = $_POST['tel'];
            $mysqli = new mysqli("localhost", "root", "", "crud");
            $stmt = $mysqli->prepare("INSERT INTO tb_clientes(nome, cpf, cep, tel) values (?, ? ,? ,?)");
            $stmt->bind_param("ssss", $nome, $cpf, $cep, $tel);
            $stmt->execute();
            echo "Usuario adicionado com sucesso";
            header("Location:users.php");
          }
        ?>
    </div>
    <script>
        $(document).ready(function() {
          $('#cpf').mask("999.999.999-99");
          $('#cep').mask("99999-999");
          $('#tel').mask("(99)999999999");
        });
      </script>
</body>
</html>