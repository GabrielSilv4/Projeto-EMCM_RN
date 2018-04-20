<?php

function conexao(){

    $servidor = "localhost"; 
    $nomebanco = "projetomc";
    $usuario = "projetomc";
    $senha = "ufrnemcgs";
     
    // Criando conexão com o bd
    $conn = new mysqli($servidor, $usuario, $senha, $nomebanco);

    // Checando Conexão
    if ($conn->connect_error) {
        echo "ERRO: Sem conexão com o banco de dados.";
        exit;
    } else {
        return $conn;
    }
}
/*

function logando($login, $senha){
 
    $conn = conexao();
    //Iniciando sessão
    session_start();

    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='" . $login . "' AND senha='" . $senha . "'");
    
    if (mysqli_num_rows($result) == 1) {
       
        $row = $result->fetch_assoc();
           
        $_SESSION['acesso'] = TRUE; //    
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['login'] = $row['login'];
        $_SESSION['admin'] = $row['admin'];
        
        header('Location: ../Telas/redirecionamento.php');
        
    } else if (mysqli_num_rows($result) != 1) {
        
        unset($_SESSION['id']);
        unset($_SESSION['nome']) ;
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
   
        
        Alert("Ops!", "Email e senha nãos correspondem", "danger");
    }
}
    


function testaLogado(){
    session_start();
    // Verifica se o usuário já fez o login
    if ($_SESSION['acesso'] == false) {
        header('Location: ../');
    }
    
}

//Estudar Função Sair!
function sair() {
    //Iniciando Sessão
    session_start();
    
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}
    //Destruir Sessão
    session_destroy();
header('Location: ../');

}*/
?>