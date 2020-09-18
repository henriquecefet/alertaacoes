<?php
include("conexao.php");
$url  = "https://api.telegram.org/bot1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o/getUpdates";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
$dados = json_decode($result, true);
$chatid = $dados['result'][0]['message']['chat']['id'];
echo $chatid;

 ?>
