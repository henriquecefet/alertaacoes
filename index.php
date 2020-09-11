<?php
$response = file_get_contents('https://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=b3sa3');
$response = json_decode($response);
echo($response);
?>
