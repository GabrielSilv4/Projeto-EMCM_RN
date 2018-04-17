<?php
/*
  $dados_ReqMat = json_decode(file_get_contents("http://dados.ufrn.br/api/action/datastore_search?resource_id=1dae94f6-cd34-4fdf-ae79-738be8ec9c7b&limit=5000"), TRUE);
  echo "<pre>";
  print_r($dados_ReqMat);
  echo "</pre>";
*/ 
function getDadosReqMat(){
      return json_decode(file_get_contents("http://dados.ufrn.br/api/action/datastore_search?resource_id=1dae94f6-cd34-4fdf-ae79-738be8ec9c7b&q=7278&limit=50000"), TRUE);
}

?>