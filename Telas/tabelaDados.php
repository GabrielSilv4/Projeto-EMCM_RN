<?php

require_once '../nbproject_1/pegarDados_ReqMaterias.php';
$stats="";
$numreq="";

if(isset($_GET["FiltroStatus"],$_GET["num_req"])){
    //Captura o Dados via GET, Status e Numero de Requisição respectivamente
    $stats = $_GET["FiltroStatus"];
    $numreq = $_GET["num_req"];
}
function montarResultado(){  
  $dados = getDadosReqMat();
   // Percorre o arquivos de dados do arquivos 
   foreach ($dados["result"]["records"] as $valores){
        //Monta a tabela
        echo "<tr>";
            echo "<td>". $valores["requisicao"].  "</td>";
            echo "<td>". $valores["status"]. "</td>";
            echo "<td>". $valores["tipo_requisicao"].  "</td>";
            echo "<td>". $valores["unidade_requisitante"].  "</td>";
            echo "<td>". $valores["valor"].  "</td>";
            echo "<td>". $valores["convenio"].  "</td>";
            echo "<td>". $valores["grupo_material"].  "</td>";
            echo "<td>". date('d/m/Y', strtotime($valores["data"])).  "</td>";
        echo "</tr>";   
       }
}

function montarResultadoStatus($stats){ 
  $dados = getDadosReqMat();
   // Percorre o arquivos de dados do arquivos 
   foreach ($dados["result"]["records"] as $valores){
        //Monta a tabela        
       if($valores["status"] == $stats){
            echo "<tr>";
            echo "<td>". $valores["requisicao"].  "</td>";
            echo "<td>". $valores["status"]. "</td>";
            echo "<td>". $valores["tipo_requisicao"].  "</td>";
            echo "<td>". $valores["unidade_requisitante"].  "</td>";
            echo "<td>". $valores["valor"].  "</td>";
            echo "<td>". $valores["convenio"].  "</td>";
            echo "<td>". $valores["grupo_material"].  "</td>";
            echo "<td>". date('d/m/Y', strtotime($valores["data"])).  "</td>";
        echo "</tr>";   
       }   
       
   }
   $stats="";
}

function montarResultadoNumReq($numreq){ 
  $dados = getDadosReqMat();
   // Percorre o arquivos de dados do arquivos 
   foreach ($dados["result"]["records"] as $valores){
        //Monta a tabela        
       if($valores["requisicao"] == $numreq){
            echo "<tr>";
            echo "<td>". $valores["requisicao"].  "</td>";
            echo "<td>". $valores["status"]. "</td>";
            echo "<td>". $valores["tipo_requisicao"].  "</td>";
            echo "<td>". $valores["unidade_requisitante"].  "</td>";
            echo "<td>". $valores["valor"].  "</td>";
            echo "<td>". $valores["convenio"].  "</td>";
            echo "<td>". $valores["grupo_material"].  "</td>";
            echo "<td>". date('d/m/Y', strtotime($valores["data"])).  "</td>";
        echo "</tr>";   
       }   
       
   }
   $numreq="";
}
?> 

<html>
    <head>
        <title>Tabela de Dados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="GET">
        <label>Status: </label>
            <select name="FiltroStatus">
                <option value="" selected> </option>
                <option value="CADASTRADA">CADASTRADA</option>
                <option value="COMPRA">COMPRA</option>
                <option value="ENVIADA">ENVIADA</option>
                <option value="EM_LIQUIDACAO" >EM LIQUIDAÇÃO</option>
                <option value="ESTORNADA">ESTORNADA</option>
                <option value="FINALIZADA">FINALIZADA</option>
                <option value="FINALIZADA_ATENDIMENTO">FINALIZADA ATENDIMENTO</option>
                <option value="LIQUIDADA_PARCIALMENTE">LIQUIDADA PARCIALMENTE</option>
                <option value="PENDENTE AUTORIZAÇÃO">PENDENTE AUTORIZAÇÃO</option>
                <option value="PENDENTE DE AUTORIZAÇÃO DE SALDO">PENDENTE AUTORIZAÇÃO DE SALDO</option>   
            </select> <br>
        <label>Nº Requisição: </label>
        <input type="text" name="num_req"><br>
        <input type="submit" value="Filtrar" name="Filtro_Status"> <br> 
            
         
         
         
            
        </form>
        <h2>Requisições de Materiais</h2>
       
            <table style="width:100%">
                <tr>
                    <th>Nº Requisição</th>
                    <th>Status</th>
                    <th>Tipo de Requisição</th> 
                    <th>Unidade Requisitante</th>
                    <th>Valor</th>
                    <th>Convênio</th>
                    <th>Grupo Material</th>
                    <th>Data </th>
                </tr>
                <?php
                if(($stats == "") && ($numreq == "")){
                  echo "1";
                  montarResultado();    
                } 
                elseif (($stats != "") && ($numreq == "")){
                  echo "2";
                  montarResultadoStatus($stats);
                 }
                elseif (($stats == "") && ($numreq != "")){
                  echo "3";
                  montarResultadoNumReq($numreq);
                }
                ?>
                   
            </table>
        </form>
    </body>
</html>


