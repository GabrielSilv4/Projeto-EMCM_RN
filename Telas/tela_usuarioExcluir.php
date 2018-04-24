<?php

require_once '../conexaoBD.php';
require_once '../CRUD_Usuario.php';

if(isset($_GET['id'])) {
          
            $id = (int)$_GET['id'];
            excluirUsuario($id);           
}
    
else
     echo "<script> alert('ERRO AQUI!')</script>";

      
?>





