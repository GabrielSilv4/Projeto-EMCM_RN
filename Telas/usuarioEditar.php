<?php
include '../conexaoBD.php';
require_once '../CRUD_Usuario.php';

$id = $_GET['id'];
$conn = conexao();

$sql = "SELECT login, nome FROM usuarios WHERE id=" .$id ;
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $login = $row['login'];
        }
}   
?> 

<html>
    <head>
        <title>Editar Usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- Esse formulário cadastra o terno -->
        <form Method="POST" action="usuarioAlterarSenha.php"> <br>
        Nome: <input type="text" name="nome" value="<?php echo $nome;?>"> <br>
        Login: <input type="text" name="login"  value="<?php echo $login;?>"> <br>
        <input type="hidden" name="id_usuario" value="<?php echo $id;?>">
        <input name="editUsuario" type="submit" value="Atualizar">
        <input name="alterarSenha" type="submit" value="Alterar Senha">
              
        </form> 
      
    </body>
</html>





