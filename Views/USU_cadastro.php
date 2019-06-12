<html>
    <head>
        <title>Tela_CadastroUsuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href='C:/xampp/htdocs/KDCamisas/CSS/EstiloLogin.css'/>
    </head>
    <body>
        <div id="caixa">
            <form action="" method="post" enctype="multipart/form-data">      
                <span>Nome: </span> <input type="text" name="nome" class="txt" required> </br>
                <span>Login: </span> <input type="text" name="login" class="txt" required> </br>
                <span>Senha: </span> <input type="password" name="senha" class="txt" required><br>
                <span>Admin: </span> <input type="radio" name="admin" value="1">SIM
                                     <input type="radio" name="admin" value="0">NÃO<br>
                <input type="submit" value="Entrar"  name="cadastrar"/> </br>		
            </form>
        </div>   
        
       <!-- <form action="./CadastrarUsuario.php" method="post" >
                <input type="submit" name="NovoUsuario" value="NovoUsuario" class="button"/>
        </form> -->
           
         
   <?php 
   
   require_once '../Model/DAO_Usuario.php';
   require_once '../Controllers/CONT_Usuario.php';
   
   if(isset($_POST["cadastrar"])){
       $Controlador = new USUARIO_CONTROLE();
       $Controlador->Cadastrar($_POST["nome"],$_POST["login"],$_POST["senha"], $_POST["admin"]);
       
       cadastrarUsuario($_POST["nome"],$_POST["login"],$_POST["senha"], $_POST["admin"]);
    }
   ?>

    </body>
</html>




