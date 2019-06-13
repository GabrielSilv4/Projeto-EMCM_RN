<?php
       require_once '../Model/conexaoBD.php';
       require_once '../Model/DAO_Empenho.php';  
       
     
       if(isset($_GET["btn"])){ 
           echo "aqui";
           cadastrarEmpenho($_GET["requisicao"], $_GET["descricao"], $_GET["empenho"], $_GET["ano"]);
           echo "aqui2";
        } 
?>

<html>
    <head>
        <title>Cadastrar Número do Empenho</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
      
        <form method="get" action="EMP_cadastrarEmpenho.php">
           
         <div class="container">  
            <br><br><br>
            <h2>Cadastrar Empenho</h2>
            
            <div class="form-group">
                <label for="empenho">Nº Empenho: </label>
                <input type="number" class="form-control" id="empenho">
            </div>
            
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <input type="text" class="form-control" id="descricao">
            </div>
            
            <div class="form-group">
                <label for="ano">Ano: </label>
                <input type="number" class="form-control" id="ano">
            </div>
            
            <div class="form-group">
                <label for="requisicao">Nº Requisição: </label>
                <input type="text" class="form-control" id="requisicao" value="<?php echo $_POST["req"] ?>" readonly="true"/> 
            </div>
            
            <button type="submit" name="btn" class="btn btn-default">Cadastrar</button>
            
         </div>  
        </form>     
       </body>
</html>      
         
 