<?php
include("conexao.php");
?>
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
        $sql =<<<EOF
           SELECT * from acoes.acoes;
EOF;
        $ret = pg_query($db, $sql);
        if(!$ret) {
             echo pg_last_error($db);
         exit;
        }
        while($row = pg_fetch_row($ret)) {
          echo("<br>");
          $url  = "http://api.hgbrasil.com/finance/stock_price?key=4750432b&symbol=".$row[0];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_URL,$url);
          $result=curl_exec($ch);
          curl_close($ch);
          //var_dump(json_decode($result, true));
          //echo("<br>");
          $dados = json_decode($result, true);
          echo "Ação: ".$dados['results'][$row[0]]['symbol'];
          echo("<br>");
          echo "Preço: ".$dados['results'][$row[0]]['price'];
          echo("<br>");
          echo "Variação: ".$dados['results'][$row[0]]['change_percent'];
          echo("<br>");
        }
        echo "Operation done successfully\n". "<br>";
        pg_close($db);
        ?>
        </div>
  </body>
</html>
