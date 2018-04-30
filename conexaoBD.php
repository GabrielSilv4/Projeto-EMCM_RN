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

?>