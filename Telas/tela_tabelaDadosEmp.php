<?php

require_once '../nbproject_1/pegarDados_Empenhos.php';
require_once '../login.php';

isLogado();
$stats = "";
$processo = "";

if (isset($_GET["FiltroStatus"], $_GET["processo"])) {
    //Captura o Dados via GET, Status e Numero de Requisição respectivamente
    $stats = $_GET["FiltroStatus"];
    $processo = $_GET["processo"];
}

function montarResultado() {
    $dados = getDadosEmp();
    // Percorre o arquivos de dados do arquivos 
    foreach ($dados["result"]["records"] as $valores) {
        //Monta a tabela
        echo "<tr>";
        echo "<td>" . $valores["cod_empenho"] . "</td>";
        echo "<td>" . $valores["ano"] . "</td>";
        echo "<td>" . $valores["processo"] . "</td>";
        echo "<td>" . $valores["natureza_despesa"] . "</td>";
        echo "<td>" . $valores["valor_empenho"] . "</td>";
        echo "<td>" . $valores["saldo_empenho"] . "</td>";
        echo "<td>" . $valores["valor_cancelado"] . "</td>";
        echo "<td>" . $valores["credor"] . "</td>";
      
        echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
        echo "</tr>";
    }
}

function montarResultadoStatus($stats) {
    $dados = getDadosReqMat();
    // Percorre o arquivos de dados do arquivos 
    foreach ($dados["result"]["records"] as $valores) {
        //Monta a tabela        
        if ($valores["status"] == $stats) {
            echo "<tr>";
            echo "<td>" . $valores["requisicao"] . "</td>";
            echo "<td>" . $valores["status"] . "</td>";
            echo "<td>" . $valores["tipo_requisicao"] . "</td>";
            echo "<td>" . $valores["unidade_requisitante"] . "</td>";
            echo "<td>" . $valores["valor"] . "</td>";
            // echo "<td>". $valores["convenio"].  "</td>";
            echo "<td>" . $valores["grupo_material"] . "</td>";
            echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
            echo "</tr>";
        }
    }
    $stats = "";
}

function montarResultadoNumProcesso($processo) {
    $dados = getDadosReqMat();
    // Percorre o arquivos de dados do arquivos 
    foreach ($dados["result"]["records"] as $valores) {
        //Monta a tabela        
        if ($valores["requisicao"] == $numreq) {
            echo "<tr>";
            echo "<td>" . $valores["requisicao"] . "</td>";
            echo "<td>" . $valores["status"] . "</td>";
            echo "<td>" . $valores["tipo_requisicao"] . "</td>";
            echo "<td>" . $valores["unidade_requisitante"] . "</td>";
            echo "<td>" . $valores["valor"] . "</td>";
            // echo "<td>". $valores["convenio"].  "</td>";
            echo "<td>" . $valores["grupo_material"] . "</td>";
            echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
            echo "</tr>";
        }
    }
    $numreq = "";
}
?> 


<html>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../Javascript/jquery-latest.js"></script> 
    <script type="text/javascript" src="../Javascript/jquery.tablesorter.js"></script>

    <body>
       
    </form>
    <h2>Empenhos </h2>
    
    <button onclick="pesquisa();"> Pesquisa </button>

    <table id="myTable" class="tablesorter">
        <thead>
            <tr >
                <th>Cód. Empenho</th>
                <th>Ano</th>
                <th>Processo</th> 
                <th>Natureza Despesa</th>
                <th>Valor Empenho</th>
                <th>Saldo Empenho</th>
                <th>Valor Cancelado</th>
                <th>Credor</th>
                <th>Data</th>
            </tr>
            <tr id="linha">

            </tr>
        </thead>
        <tbody>
            <?php
            if (($stats == "") && ($processo == "")) {
                montarResultado();
            } /*elseif (($stats != "") && ($processo == "")) {
                montarResultadoStatus($stats);
            } elseif (($stats == "") && ($$processo != "")) {
                montarResultadoNumReq($numreq);
            }*/
            ?>
        </tbody>
    </table><br><br>   
</body>



<script>


    $(document).ready(function () {
        $("#myTable").tablesorter();
    }
    );

    $(document).ready(function () {
        $("#myTable").tablesorter(sortInitialOrder);
    }
    );


    function pesquisa() {
        document.getElementById("linha").innerHTML =
                  "<th><input type='text' id='txtColuna1'/></th>"
                + "<th><input type='text' id='txtColuna2'/></th>"
                + "<th><input type='text' id='txtColuna3'/></th>"
                + "<th><input type='text' id='txtColuna4'/></th>"
                + "<th><input type='text' id='txtColuna5'/></th>"
                + "<th><input type='text' id='txtColuna6'/></th>"
                + "<th><input type='text' id='txtColuna7'/></th>";


        $(function () {
            $("#myTable input").keyup(function () {
                var index = $(this).parent().index();
                var nth = "#myTable td:nth-child(" + (index + 1).toString() + ")";
                var valor = $(this).val().toUpperCase();
                $("#myTable tbody tr").show();
                $(nth).each(function () {
                    if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                        $(this).parent().hide();
                    }
                });
            });

            $("#myTable input").blur(function () {
                $(this).val("");
            });
        });
    }
</script>


</html>



