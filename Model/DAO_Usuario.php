<?php

require_once 'conexaoBD.php';

//Cadastrar Usuário
function cadastrarUsuario($nome, $login, $senha, $admin) {
    $conn = conexao();
    
    $sql = "INSERT INTO usuarios(nome, login, senha, admin)  VALUES('" .$nome. "','" .$login. "','" . md5($senha) . "','" . $admin . "' )";
   
    if($conn->query($sql)){
        echo "<script> alert('Usuário cadastrado com sucesso')</script>";
        echo "<script type='text/javascript'>location.href ='../Telas/redirecionamento.php'</script>"; 
    } 
    
    else{
        //Erro ao se conectar ao banco de dados
        echo "Error: " . $sql . "<br>" . $conn->error;}
        
    $conn->close();
}


// Editar Usuário
function editarUsuario($login, $nome,  $id) {
    echo $login;
    $conn = conexao();
   
    $sql = "UPDATE usuarios SET nome='" . $nome . "', login='" . $login .  "' WHERE id=" . $id ; 
    $consulta = mysqli_query($conn,$sql);
    
    if ($consulta->num_rows > 0){
        echo "<script> alert('Dados atualizados com sucesso')</script>"; 
        echo "<a href='./index.php'/>";
    }
    
    else {
        echo "Error: " .$sql. "<br>" .$conn->error;
    }
    $conn->close();
}

// Listar os Usuários
function listarUsuarios(){
    $conn = conexao();
    
    $result = mysqli_query($conn, "Select * from usuarios ");
   
    if (mysqli_num_rows($result)) {
        $Listuser = "";
        while ($row = $result->fetch_assoc()) {
            $Listuser .="<tr><td>" . $row['nome'] . "</td>";
            $Listuser .="<td>" . $row['login'] . "</td>";
            
            // Parte que deixa ações no listar (LISTAR E EXCLUIR) 
            $Listuser .="<td>"
                      .   "<a href='usuarioEditar.php?id=" .$row['id']. "' <span class='glyphicon glyphicon-pencil'> </span> </a>"                      
                      .   "<a href='usuarioExcluir.php?id=" .$row['id']."' <span class='glyphicon glyphicon-remove'> </span> </a>"
                      . "</td>";
        }
    }
    $conn->close();
    return $Listuser;
}


// Excluir Usuário
function excluirUsuario($id){

    $conn = conexao();
    $sql = "DELETE FROM usuarios WHERE id=" .$id;
  
    if($conn->query($sql)){
        echo "<script> alert('Usuário excluído com sucesso') </script>";
        echo "<script type='text/javascript'>location.href ='usuarioListar.php'</script>";    
    } 
    else{
        echo "<script> alert('Erro ao tentar excluir usuário') </script>";
        echo "<a href='../Telas/listarUsuarios.php'> </script>" ;
    }    
            
    $conn->close();

}
 

function editarSenha($id, $senha) {
 
    $conn = conexao();  
    $sql = "UPDATE usuarios SET  senha='" . md5($senha) . "' WHERE id=" . $id ; 
    $consulta = $conn->query($sql);
    
    if($consulta->num_rows > 0){
        echo "<script> alert('Dados atualizados com sucesso')</script>"; }
    
    else{
        echo "Error: " .$sql. "<br>" .$conn->error;}
    $conn->close();
}

?>