<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/loginStyle.css">

    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action=""  class="form-signin" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Usuário" required autofocus>
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar-me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="botao">Entrar</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Esqueceu sua senha?
            </a>
        </div><!-- /card-container -->
    </div><!-- /contain/container -->
<?php 
   require_once '../Model/login.php';
   
   if(isset($_POST["botao"])){
       logar($_POST["login"],$_POST["senha"]);
   }
?>

</html>

