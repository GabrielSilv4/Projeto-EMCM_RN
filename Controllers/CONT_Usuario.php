<?php

class USUARIO_CONTROLE{
    
    public function cadastrar($nome, $login, $senha, $admin){
        require ('../Model/DAO_Usuario.php');
        cadastrarUsuario($nome, $login, $senha, $admin);
    }
        
    public function listar() {
        require ('../Model/DAO_Usuario.php');
        listarUsuarios();
    }
    
    public function atualizar($nome, $area,$id) {
         require ('../Model/DAO_Usuario.php');
         editarUsuario($nome, $area,$id);
    }
    
    public function excluir($id) {
          require ('../Model/DAO_Usuario.php');
          excluirUsuario($id);
    }
    
    public function editarSenha($login, $id, $senha){
         require ('../Model/DAO_Usuario.php');
         editarUsuario($login, $nome, $id);
    }
    
}

