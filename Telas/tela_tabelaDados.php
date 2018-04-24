<?php

require_once '../nbproject_1/pegarDados_ReqMaterias.php';
require_once '../login.php';

isLogado();
$stats = "";
$numreq = "";

if (isset($_GET["FiltroStatus"], $_GET["num_req"])) {
    //Captura o Dados via GET, Status e Numero de Requisição respectivamente
    $stats = $_GET["FiltroStatus"];
    $numreq = $_GET["num_req"];
}

function montarResultado() {
    $dados = getDadosReqMat();
    // Percorre o arquivos de dados do arquivos 
    foreach ($dados["result"]["records"] as $valores) {
        //Monta a tabela
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

function montarResultadoNumReq($numreq) {
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
        <!--
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
        -->    
    </form>
    <h2>Requisições de Materiais</h2>
    
    <button onclick="pesquisa();"> Pesquisa </button>

    <table id="myTable" class="tablesorter">
        <thead>
            <tr >
                <th>Nº Requisição</th>
                <th>Status</th>
                <th>Tipo de Requisição</th> 
                <th>Unidade Requisitante</th>
                <th>Valor</th>
               <!-- <th>Convênio</th> -->
                <th>Grupo Material</th>
                <th>Data </th>
            </tr>
            <tr id="linha">

            </tr>
        </thead>
        <tbody>
            <?php
            if (($stats == "") && ($numreq == "")) {
                montarResultado();
            } elseif (($stats != "") && ($numreq == "")) {
                montarResultadoStatus($stats);
            } elseif (($stats == "") && ($numreq != "")) {
                montarResultadoNumReq($numreq);
            }
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

