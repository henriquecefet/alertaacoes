<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alerta de Ações</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </head>
    <body>
    <div class="jumbotron text-center">
    <h1>Alerta de Ações</h1>
       <p>Lista de Ações da B3</p>
     </div>
        <div class="container">

        <?php
        echo("olá");
        echo("<br>");
        $url  = "'https://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=b3sa3'";


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0');

        $exe  = curl_exec($ch);
        $getInfo = curl_getinfo($ch);

        if ($exe === false) {
            $output = "Error in sending";
            if (curl_error($ch)){
                $output .= "\n". curl_error($ch);
            }
        } else if($getInfo['http_code'] != 777){
            $output = "No data returned. Error: " . $getInfo['http_code'];
            if (curl_error($ch)){
                $output .= "\n". curl_error($ch);
            }
        }

        curl_close($ch);

        echo $output;
        ?>
        </div>
  </body>
</html>
