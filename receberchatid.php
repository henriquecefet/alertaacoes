<?php
include("conexao.php");
include("funcaotelegram.php");

$update = json_decode(file_get_contents("php://input"), TRUE);


if( !$update ){
    telegram("Some Error output (request is not valid JSON)",1037497721);
}
elseif( !isset($update['update_id']) || !isset($update['message']) ){
    telegram("Some Error output (request has not message)",1037497721);

}
else{
  $chatId = $update["message"]["chat"]["id"];
  $message = $update["message"]["text"];
  if($message == "ações"){
    mandarAcoesParaUmaPessoa($chatId);
  }
  elseif($message == "salvar"){
    adicionarChat($chatId);
  }else{
    telegram("Olá, tudo bem?
    Digite 'ações' para receber recomendações de ações agora.
     Digite 'salvar' para reber recomendações de ações ao longo do dia",$chatId);
  }
}
 ?>
