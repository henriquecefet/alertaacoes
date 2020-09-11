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
echo("olá");
$ch = curl_init();
// IMPORTANT: the below line is a security risk, read https://paragonie.com/blog/2017/10/certainty-automated-cacert-pem-management-for-php-software
// in most cases, you should set it to true
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=b3sa3');
$result = curl_exec($ch);
if($result){
  curl_close($ch);

  $obj = json_decode($result);
  echo "<br>";
  echo $obj["valid_key"];
  echo "<br>";
  echo $obj->valid_key;
}
else{
  echo "não foi";
}

?>
</div>
  </body>
</html>
