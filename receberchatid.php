<?php
include("conexao.php");
include("funcaotelegram.php");

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if(strtolower($message) == "ações" || strtolower($message) == "acões" || strtolower($message) == "acoes"
|| strtolower($message) == "açoes"){
  mandarAcoesParaUmaPessoa($chatId);
}
elseif(strtolower($message) == "salvar"){
  adicionarChat($chatId);
}else{
  telegram("Olá, tudo bem?
  Digite 'ações' para receber recomendações de ações agora.
  Digite 'salvar' para reber recomendações de ações ao longo do dia",$chatId);
  }

//http_response_code(200);

?>
