<?php
require_once 'conexaoBD.php';


// Função Login
function logar($login, $senha) {
    session_start();
    $conn = conexao();
    $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' and senha = '" . md5($senha) . "'";
    $result = $conn->query($sql);

    // Se achar algum login válido...
    if ($result->num_rows > 0) { 
        $_SESSION['login'] = $login;
        //Direciona para um tela específica
        echo "<script type='text/javascript'>location.href ='../Telas/tela_tabelaDadosReq.php'</script>";
    } else {
        // Alerta em caso não válido
        echo "<script> alert('Login ou senha inválido')</script>";
    }
}

// Função para verificar se está Logado 

function isLogado(){
    // Inicia sessão 
    session_start();
    // Verifica se existe os dados da sessão de login 
   if(!isset($_SESSION['login']) == true ){
       logout();
       echo "<script type='text/javascript'>location.href ='../Telas/tela_Login.php'</script>";
    }
 }
     
function logout() {
    //Destruir a sessão atual
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    session_destroy();
    echo "<script type='text/javascript'>location.href ='../Telas/tela_Login.php'</script>";
}
?>

