<?php
include("conexao.php");
$vender = array();
$comprar = array();
$estavel = array();
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
          $acao =  array([$row[0],$row[1] ,$row[2] );
          if($row[2]>1){
            array_push($vender, $acao);
          }
          elseif($row[2]<-1){
            array_push($comprar, $acao);
          }
          else{
              array_push($estavel, $acao);
          }

        }
        //var_dump($comprar);
        pg_close($db);
        ?>
        </div>
    <div class="row">
      <div class="col-md-4">
        <h2>Vender:</h2>
          <?php
          for($i = 0; $i < sizeof($vender); $i = $i + 1){
            echo "Ação: ".$vender[$i][0];
            echo("<br>");
            echo "Preço: ".$vender[$i][1];
            echo("<br>");
            echo "Variação: ".$vender[$i][2];
            echo("<br>");
          }

           ?>
      </div>
      <div class="col-md-4">
        <h2>Comprar:</h2>
        <?php
        for($i = 0; $i < sizeof($comprar); $i = $i + 1){
          echo "Ação: ".$comprar[$i][0];
          echo("<br>");
          echo "Preço: ".$comprar[$i][1];
          echo("<br>");
          echo "Variação: ".$comprar[$i][2];
          echo("<br>");
        }

         ?>
      </div>
      <div class="col-md-4">
        <h2>Estavél</h2>
        <?php
        for($i = 0; $i < sizeof($estavel); $i = $i + 1){
          echo "Ação: ".$estavel[$i][0];
          echo("<br>");
          echo "Preço: ".$estavel[$i][1];
          echo("<br>");
          echo "Variação: ".$estavel[$i][2];
          echo("<br>");
        }

         ?>
      </div>
    </div>
  </body>
</html>
