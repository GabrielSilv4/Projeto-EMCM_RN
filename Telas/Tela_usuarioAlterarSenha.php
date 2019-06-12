<?php
include '../conexaoBD.php';
require_once '../CRUD_Usuario.php';

if (isset($_POST['editUsuario'])){
    editarUsuario($_POST['login'], $_POST['nome'], $_POST['id_usuario']);
    
}  

$id = $_POST['id_usuario'];
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
        <title>Alterar Senha</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
   
        <form Method="POST" action=""> <br>
            Nome: <input type="text"  name="nome" disabled value="<?php echo $nome;?>"> <br>
            Login: <input type="text" name="login" disabled value="<?php echo $login;?>"> <br>
            Senha: <input type="password" name="senha"  placeholder="Digite a nova senha" value="" required> <br>
        
        <input type="hidden" name="id_usuario" value="<?php echo $id;?>">
        <input name="alteraSenha" type="submit" value="Atualizar">
        
              
        </form> 
      
    </body>
</html>

<?php
    
    if (isset($_POST['alteraSenha'])){
        editarSenha($_POST['id_usuario']);
        header("Location:redirecionamento.php");
  
    }
?>



