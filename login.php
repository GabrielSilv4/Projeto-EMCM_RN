<?php
require_once 'conexaoBD.php';

// Função Login
function logar($login, $senha) {
    //session_cache_expire(10);
    session_start();
    $conn = conexao();
    $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' and senha = '" . md5($senha) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { 
        $_SESSION['login'] = $login;
        echo "<script type='text/javascript'>location.href ='../Telas/tela_tabelaDados.php'</script>";
    } else {
        echo "<script> alert('Login ou senha inválido')</script>";
    }
}

// Função para verificar se está Logado 

function isLogado(){
    // Inicia sessões 
    session_start();
    // Verifica se existe os dados da sessão de login 
   if(!isset($_SESSION['login']) == true ){
       echo "aqui doido";
       logout();
    echo "<script type='text/javascript'>location.href ='../Telas/tela_Login.php'</script>";
   
    }
   $logado = $_SESSION['login'];

 }
     



function logout() {
    //Destruir a sessão
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    session_destroy();
}

?>

