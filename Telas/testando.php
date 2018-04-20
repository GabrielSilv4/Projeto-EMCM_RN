<script>
    function adicionar() {
            var disciplina = localStorage.setItem("Disciplina",document.getElementById("nomedisciplina").value);
            var nome = localStorage.getItem("Disciplina");
            var table = document.getElementById("myTable2");
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
                cell1.innerHTML = nome;       
}
</script>

<html>
    <body>
    // HTML ,  tabela e, botão e input
    <table id="myTable2">
      <thead>
        <tr>
            <th>Disciplina</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        </tr>
      </tbody>
    </table>
    </body>
</html>    

Adicionar nome da disciplina: <input type="text" name="nome" id="nomedisciplina"  onkeypress="return onlyAlphabets(event,this);" >    
<button id ="adicionardisc" onclick="adicionar()">Adicionar disciplina</button><br>
