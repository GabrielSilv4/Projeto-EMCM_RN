<?php

require_once '../nbproject/pegarDados_Empenhos.php';
require_once 'conexaoBD.php';

//Cadastra o Empenho no Banco de Dados
function cadastrarEmpenho($codRequisicao, $descricao, $codEmp, $ano) {
    
    //Inicializacao da variável para evitar erro na verificão
    $codEmpenho = null;
    $dados = getDadosEmp();
    foreach ($dados["result"]["records"] as $valores) {
        if (($valores["cod_empenho"] == $codEmp) && ($valores["ano"] == $ano)) {
            $codEmpenho = $valores["cod_empenho"];
            $ano = $valores["ano"];
            $processo = $valores["processo"];
            $naturezaDespesa = $valores["natureza_despesa"];
            $valorEmpenho = $valores["valor_empenho"];
            $saldoEmpenho = $valores["saldo_empenho"];
            $valorCancelado = $valores["valor_cancelado"];
            $credor = $valores["credor"];
            $data = date($valores["data"]);
            break;
        }
    }
    
    // Caso o Código do Empenho seja encontrado
    if ($codEmpenho != null) {
        $conn = conexao();

        $sql = "INSERT INTO empenhos (codRequisicao, codEmpenho, ano, processo, naturezaDespesa , valorEmpenho, saldoEmpenho, valorCancelado, credor, data, itemDescricao) 
                VALUES ('" . $codRequisicao . "','" . $codEmpenho . "','" . $ano . "','" . $processo . "','" . $naturezaDespesa . "','"
                . $valorEmpenho . "','" . $saldoEmpenho . "','" . $valorCancelado . "','" . $credor . "','" . $data . "','" . $descricao . "')";
        
        if ($conn->query($sql)){
            echo "<script> alert('Empenho Cadastrado com sucesso !')</script>";
            echo "<script type='text/javascript'>location.href ='../Telas/Tela_principal.php'</script>";
        } 
        else{ //Erro ao se conectar ao banco de dados
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } 
    else{
        echo "<script> alert('Empenho Não Encontrado, AQUI')</script>";   
        //echo "<script type='text/javascript'>location.href ='../Telas/Tela_principal.php'</script>";
    }
}

    // Editar Empenho
function editarEmpenho($login, $nome, $id) {
    echo $login;
    $conn = conexao();

    $sql = "UPDATE usuarios SET nome='" . $nome . "', login='" . $login . "' WHERE id=" . $id;
    $consulta = mysqli_query($conn, $sql);

    if ($consulta->num_rows > 0) {
        echo "<script> alert('Dados atualizados com sucesso')</script>";
        echo "<a href='./index.php'/>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

    // Listar os Empenhos do Banco de Dados
function listarEmpenhos() {
    $conn = conexao();
    $result = mysqli_query($conn, "Select * from empenhos");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['codRequisicao'] . "</td>";
            echo "<td>" . $row['codEmpenho'] . "</td>";
            echo "<td>" . $row['ano'] . "</td>";
            echo "<td>" . $row['itemDescricao'] . "</td>";
            echo "<td>" . 'R$ ' . number_format($row['valorEmpenho'], 2, ',', '.') . "</td>";
            echo "<td>" . $row['credor'] . "</td>";
            echo "<td>" . $row['data'] . "</td>";
            echo "<td> <a href='usuarioEditar.php?id=" . $row['codEmpenho'] . "' <span class='glyphicon glyphicon-pencil'> </span> </a>"
                    . "<a href='usuarioExcluir.php?id=" . $row['codEmpenho'] . "'<span class='glyphicon glyphicon-remove'> </span> </a>"
                    . "</td>";
            echo "</tr>";
            
            // Parte que deixa a��es no listar (LISTAR E EXCLUIR)  na linha da tabela
            /*
              $Listuser .= "<td>"
              . "<a href='usuarioEditar.php?id=" . $row['id'] . "' <span class='glyphicon glyphicon-pencil'> </span> </a>"
              . "<a href='usuarioExcluir.php?id=" . $row['id'] . "' <span class='glyphicon glyphicon-remove'> </span> </a>"
              . "</td>";

             */
        }
    }
    $conn->close();
}

    // Excluir Empenho
function excluirEmpenho($codEmpenho) {

    $conn = conexao();
    $sql = "DELETE FROM empenhos WHERE codEmpenho=" . $codEmpenho;

    if($conn->query($sql)) {
        echo "<script> alert('Empenho exclu�do com sucesso')</script>";
        echo "<script type='text/javascript'>location.href = 'usuarioListar.php'</script>";
    } 
    else {
        echo "<script> alert('Erro ao tentar excluir usu�rio')</script>";
        echo "<a href='../Telas/listarUsuarios.php'> </script>";
    }

    $conn->close();
}

