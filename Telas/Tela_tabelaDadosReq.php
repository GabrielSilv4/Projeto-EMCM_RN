<?php

require_once '../nbproject/pegarDados_ReqMaterias.php';
require_once '../Model/login.php';

//isLogado();

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
        echo "<td>" . $valores["grupo_material"] . "</td>";
        echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
        echo "</tr>";
    }
}
?> 


<html>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../Javascript/jquery-latest.js"></script> 
    <script type="text/javascript" src="../Javascript/jquery.tablesorter.js"></script>

    <body>   
    
    <h2>Requisições de Materiais</h2>
   
    <button onclick="pesquisa();"> Pesquisa </button>
    <!-- <button position="left" onclick="<logout()"> Sair </button> --> 
    <table id="myTable" class="tablesorter">
        <thead>
            <tr id="linha">
                <th>Nº Requisição</th>
                <th>Status</th>
                <th>Tipo de Requisição</th> 
                <th>Unidade Requisitante</th>
                <th>Valor</th>
                <th>Grupo Material</th>
                <th>Data </th>
            </tr>
        </thead>
        <tbody>
            <?php
                montarResultado();
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
                + "<th><input type='text' id='txtColuna7'/></th>"
                + "<th><input type='text' id='txtColuna8'/></th>"
                + "<th><input type='text' id='txtColuna9'/></th>";


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

