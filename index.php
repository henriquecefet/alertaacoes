<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alerta de Ações</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="redirect.js"></script>
    </head>
    <body>
    <div class="jumbotron text-center">
    <h1 onclick="redirectIndex()">Alerta de Ações</h1>
       <p>Lista de Ações da B3</p>
     </div>
        <div class="container">

<?php
function CallAPI($url){
  ini_set("allow_url_fopen", 1);
  $json = file_get_contents($url);
  return json_decode($json);
}
$respota = CallAPI("https://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=b3sa3");
echo($respota);
?>
</div>
  </body>
</html>
