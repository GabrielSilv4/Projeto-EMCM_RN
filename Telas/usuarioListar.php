<?php
require_once '../conexaoBD.php';
require_once '../CRUD_Usuario.php';
?>

<!DOCTYPE html>
<html>
    
    <style> 
            table tr, th, td{
                border: 1px solid black;
                border-collapse: collapse;
                position: relative;
                text-align: center;
                
            }
            
       
    </style>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>
    <body>

        <table width="70%">
            <tr>
                <th style="text-align: center">Nome</th> 
                <th style="text-align: center">Login</th>
                <th style="text-align: center">Ações</th>
                <?php
                echo listarUsuarios();
                ?>
            </tr>
           
        </table>

    </body>
</html>

