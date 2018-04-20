<style>
    
    body{
    font-family:Verdana;
}

#tabela{
    width:100%;
    border:solid 1px;
    text-align:left;
    border-collapse:collapse;
}

#tabela tbody tr{
    border:solid 1px;
    height:30px;
    cursor:pointer;
}

#tabela thead{
    background:beige;
}

#tabela thead th:nth-child(1){
    width:100px;
}

#tabela input{
    color:navy;
    width:100%;
}
</style>



<html>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 
   
    <head>
        
    </head>
    <body>
        <div id="divConteudo">
            <table id="tabela">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Preco</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1"/></th>
                        <th><input type="text" id="txtColuna2"/></th>
                        <th><input type="text" id="txtColuna3"/></th>
                    </tr>            
                </thead>
                <tbody>
                    <tr>
                        <td>001.01-A</td>
                        <td>Feijão preto</td>
                        <td>5.89</td>
                    </tr>
                    <tr>
                        <td>001.02-B</td>
                        <td>Feijão branco</td>
                        <td>5.00</td>
                    </tr>            
                    <tr>
                        <td>002.10-C</td>
                        <td>Arroz parboilizado</td>
                        <td>10.0</td>
                    </tr>
                    <tr>
                        <td>003.12-D</td>
                        <td>Iogurte de morango</td>
                        <td>2.30</td>
                    </tr>
                    <tr>
                        <td>041.27-E</td>
                        <td>Sabão em pó</td>
                        <td>6.20</td>
                    </tr>            
                </tbody>
            </table>
        </div>
    </body>
    
  <script>  
   $(function () {
        $("#tabela input").keyup(function () {
            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function () {
                if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                    $(this).parent().hide();
                }
            });
        });

        $("#tabela input").blur(function () {
            $(this).val("");
        });
    }); 
</script>
</html>