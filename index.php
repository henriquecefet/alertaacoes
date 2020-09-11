<?php
$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$response  = file_get_contents('https://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=b3sa3');
$response = json_decode($response);
echo($response);
?>
