<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href='C:/xampp/htdocs/KDCamisas/CSS/EstiloLogin.css'/>
    </head>
    <body>
        <div id="caixa">
            <form action="" method="post" enctype="multipart/form-data">      
                <span>Login: </span> <input type="text" name="login" class="txt" required> </br>
                <span>Senha: </span> <input type="password" name="senha" class="txt" required>
                <input type="submit" value="Entrar" class="button" name="botao"/> </br>		
            </form>
        </div>   
    <!--    
        <form action="./CadastrarUsuario.php" method="post" >
                <input type="submit" name="NovoUsuario" value="NovoUsuario" class="button"/>
        </form>
    -->       
         
   <?php 
   
   require_once '../login.php';
   
   if(isset($_POST["botao"])){
       logar($_POST["login"],$_POST["senha"]);
    }
   ?>

    </body>
</html>
