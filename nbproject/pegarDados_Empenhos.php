<?php
/*
$dados_Emp = json_decode(file_get_contents("http://dados.ufrn.br/api/action/datastore_search?resource_id=35d07c2e-d528-4a33-a912-6f223648eb00&limit=5000"));
echo "<pre>";
print_r($dados_Emp);
echo "</pre>";
*/ 

function getDadosEmp(){
    
   return json_decode(file_get_contents("http://dados.ufrn.br/api/action/datastore_search?resource_id=35d07c2e-d528-4a33-a912-6f223648eb00&limit=5000"));

}
    
?>