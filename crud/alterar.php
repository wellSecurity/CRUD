<?php
require_once("config.php");
?>
<?php

if(isset($_POST['delete'])) {
    $id = $_POST['nid'];
    $mysqli = new mysqli("localhost", "root", "", "crud");
    $stmt = $mysqli->prepare("DELETE FROM tb_clientes WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    echo "Deletado com sucesso";
    header("Location:users.php");
}
?>
<form method="POST" action="gambi.php">
    <input type="text" min=1 max=255 value="<?php echo $_POST['nid']; ?>" name="id1">
    <input type="text" min=1 max=255 value="<?php echo $_POST['nnome']; ?>" name="nome1">
    <input type="text" min=1 max=255 value="<?php echo $_POST['ncpf']; ?>" name="cpf1">
    <input type="text" min=1 max=255 value="<?php echo $_POST['ncep']; ?>" name="cep1">
    <input type="text" min=1 max=255 value="<?php echo $_POST['ntel']; ?>" name="tel1">
    <input type="submit" name="btn">Edit</button>
</form>