<?php

class REQUISICAO_CONTROLE{
    
    public function Cadastrar($nome,$area){
        require ('../Models/DISC_Crud.php');
        cadastrar($nome, $area);
    }
        
    public function Listar() {
        require ('../Models/DISC_Crud.php');
        listar();
    }
    
    public function atualizar($nome, $area,$id) {
        require ('../Models/DISC_Crud.php');
        editar($nome, $area,$id);
    }
    
    public function excluir($id) {
         require ('../Models/DISC_Crud.php');
         excluir($id);
    }
}




