<?php
require_once '../nbproject/pegarDados_ReqMaterias.php';
require_once '../nbproject/pegarDados_Empenhos.php';
require_once '../Model/conexaoBD.php';
require_once '../Model/DAO_Empenho.php';
require_once '../Model/login.php';

//isLogado();

?>


<!DOCTYPE html>
<html lang="br">
    <head>
        <title>Principal</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body witdh="80%">
        <div witdh="90%">
            <h2>Sistema de Gerenciamento de Requisições</h2>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#req">Requisição Materiais</a></li>
                <li><a data-toggle="tab" href="#bd">Requisições Empenhadas</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="req" class="tab-pane fade in active">
                    <table id="tabela" class="display" witdh="100%">
                        <thead>
                            <tr>
                                <th>Número Requisição</th>
                                <th>Status</th>
                                <th>Tipo de Requisição</th> 
                                <th>Unidade Requisitante</th>
                                <th>Valor</th>
                                <th>Grupo Material</th>
                                <th>Data </th>
                                <th>Nº Empenho</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                //echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
                                echo "<td>" . date('Y/m/d', strtotime($valores["data"])) . "</td>";
                                echo "<td> <form action='../Views/EMP_cadastrarEmpenho.php' method='get' enctype='multipart/form-data'>     "
                                . "<input type='hidden' name='req' value= '" . $valores["requisicao"] . "' />"
                                . "<input type='submit' value='Empenho'  class='btn btn-info btn-lg'/> "
                                . "</form> </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table><br><br>   
                </div>
                
                <div id="bd" class="tab-pane fade">
                    <table id="tabela2" class="display">
                        <thead>
                            <tr>
                                <th>Nº Requisição</th>
                                <th>Nº Empenho</th>
                                <th>Ano</th>
                                <th>Descrição </th>  
                                <th>Valor Empenho</th>
                                <th>Credor</th>
                                <th>Data</th>
                                <th>Ações</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            listarEmpenhos();
                            ?>
                        </tbody>
                    </table><br><br>   
                </div>
            </div>
        </div>
    
        <script>
           $(document).ready(function() {
                $('#tabela').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando páginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar: ",
                    "paginate": {
                               "first":      "First",
                               "last":       "Last",
                               "next":       "Próximo",
                               "previous":   "Anterior"
                               }
                            }
                                       });

                $('#tabela2').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando páginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar: ",
                    "paginate": {
                               "first":      "First",
                               "last":       "Last",
                               "next":       "Próximo",
                               "previous":   "Anterior"
                               }
                            }
                                       });
                });
        </script>                               
    </body>
</html>