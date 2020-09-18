<?php
$path = "https://api.telegram.org/bot1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
telegram("Olá, tudo bem?");
 ?>
