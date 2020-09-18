<?php
include("conexao.php");
include("funcaotelegram.php");
$url  = "https://api.telegram.org/bot1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o/getUpdates";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
$dados = json_decode($result, true);
$chatid = $dados['result'][0]['message']['chat']['id'];
$sql =<<<EOF
   INSERT INTO acoes.usuarios (chatid) VALUES ('$chatid');
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
}
else{
  echo "Banco atualizado";
  telegram("Seu numero foi registrado. Você receberá recomendações de ações.");
}
 ?>
