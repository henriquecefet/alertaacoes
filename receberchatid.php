<?php
include("conexao.php");
include("funcaotelegram.php");
$path = "https://api.telegram.org/bot1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
if(strcasecmp($message, "ações") == 0){
  mandarAcoesParaUmaPessoa($chatId);
}

elseif(strcasecmp($message, "salvar") == 0){
  adicionarChat($chatId);
}else{
  telegram("Olá, tudo bem?
  Digite 'ações' para receber recomendações de ações agora.
   Digite 'salvar' para reber recomendações de ações ao longo do dia",$chatId);
}


 ?>
