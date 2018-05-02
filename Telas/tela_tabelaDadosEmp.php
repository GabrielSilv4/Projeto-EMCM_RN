<?php
require_once '../nbproject_1/pegarDados_Empenhos.php';
require_once '../login.php';

isLogado();

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
?> 


<html>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../Javascript/jquery-latest.js"></script> 
    <script type="text/javascript" src="../Javascript/jquery.tablesorter.js"></script>

    <body>

    </form>
    <h2>Empenhos</h2>
    <!-- Botão responsável por pesquisar cada campo da tabela -->
    <button onclick="pesquisa();">Pesquisa</button>

    <table id="myTable" class="tablesorter" witdh="100%" >
        <thead>
            <tr id="linha">
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



