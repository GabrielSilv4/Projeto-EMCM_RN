<?php
require_once 'conexaoBD.php';
 
function logar($login,$senha){
  //session_cache_expire(10);
    session_start();

    $conn = conexao();
    $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' and senha = '" . md5($senha) . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
       echo "<script type='text/javascript'>location.href ='./novaTabela.php'</script>";
    }
    
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
            
}

/* Função para verificar se está Logado 
function verificar_LOG() {
    
    session_start();

    if (isset($_SESSION['login']) and isset($_SESSION['senha']) and isset($_SESSION['nome'])) {

        return [$_SESSION['nome'], $_SESSION['login']];
    } else {
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['login']);
        unset($_SESSION['senha']);

        logout_LOG();

        header('location:./TelaLogin.php');
    }
   
}
 
 
function logout_LOG() {
    // Destruir a sessão
    session_destroy();
}
*/
?>


