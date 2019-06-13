<?php

//CONECTAR          
         require_once '../Model/conexaoBD.php';            
//        require_once '../Controller/UsuarioController.php';
//        $objControl = new UsuarioController();
//
//        $objControl->verificarlogin();

        if (isset($_GET['id']) && ($_SESSION['id'] != $_GET['id'])) {
            require_once '../Controllers/CONT_Usuario.php';

            $id = (int) $_GET['id'];
            $usuario = new USUARIO_Controller();
            $usuario->ExcluirUser($id);
        }
        // voltar a pagina anterior
         header("Location: ".$_SERVER['HTTP_REFERER']."");