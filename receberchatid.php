<?php
include("conexao.php");
include("funcaotelegram.php");
$path = "https://api.telegram.org/bot1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

/*if($message == "ações"){
  mandarAcoesParaUmaPessoa($chatId);
}
elseif($message == "salvar"){
  adicionarChat($chatId);
}else{
  telegram("Olá, tudo bem?
  Digite 'ações' para receber recomendações de ações agora.
   Digite 'salvar' para reber recomendações de ações ao longo do dia",$chatId);
}
*/
telegram("Olá, tudo bem?
Digite 'ações' para receber recomendações de ações agora.
 Digite 'salvar' para reber recomendações de ações ao longo do dia",$chatId);

 ?>
