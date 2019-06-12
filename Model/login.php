<?php
require_once '../Model/conexaoBD.php';


// Função Login
function logar($login, $senha){
    session_start();
    $conn = conexao();                          //. md5($senha) . criptografia//
    $sql = "SELECT * FROM usuarios WHERE login='" . $login . "' and senha = '" . $senha . "'";
    $result = $conn->query($sql);

    // Se achar algum login válido...
    if ($result->num_rows > 0) { 
        $_SESSION['login'] = $login;
        //Direciona para um tela específica
        echo "<script type='text/javascript'>location.href ='../Telas/Tela_principal.php'</script>";
    } else {
        // Alerta em caso não válido
        echo "<script> alert('Login ou senha inválido')</script>";
        echo "<script type='javascript'>alert('Login ou senha inválido');";
        echo "<script type='text/javascript'>location.href ='../Telas/Tela_login.php'</script>";   
    }
}

 // Função responsável por destruir a sessão (Sair do sistema)
function logout() {
    //Destruir a sessão atual
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    session_destroy();
    echo "<script type='text/javascript'>location.href ='../Views/Login.php'</script>";
}

// Função para verificar se está logado no sistema 
function isLogado(){
    // Inicia sessão 
    session_start();
    // Verifica se existe os dados da sessão de login 
   if(!isset($_SESSION['login']) == true ){
       logout();
       echo "<script type='text/javascript'>location.href ='../Views/Login.php'</script>";
    }   
 }
 
?>

