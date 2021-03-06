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
    <body style="background-color:#f8f9fa">
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
          $acao =  array($row[0],$row[1] ,$row[2] );
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
            echo "<div class='card mb-4 shadow-sm' style='background-color:#b3ffb3'>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>Ação: ".$vender[$i][0]."<p class='card-text'>";
            echo "<p class='card-text'>Preço: R$".$vender[$i][1]."<p class='card-text'>";
            echo "<p class='card-text'>Variação: ".$vender[$i][2]."%<p class='card-text'>";
            echo "</div>";
            echo "</div>";
            echo("<br>");
          }

           ?>
      </div>
      <div class="col-md-4">
        <h2>Comprar:</h2>
        <?php
        for($i = 0; $i < sizeof($comprar); $i = $i + 1){
          echo "<div class='card mb-4 shadow-sm' style='background-color:#ff9999'>";
          echo "<div class='card-body'>";
          echo "<p class='card-text'>Ação: ".$comprar[$i][0]."<p class='card-text'>";
          echo "<p class='card-text'>Preço: R$".$comprar[$i][1]."<p class='card-text'>";
          echo "<p class='card-text'>Variação: ".$comprar[$i][2]."%<p class='card-text'>";
          echo "</div>";
          echo "</div>";
          echo("<br>");
        }

         ?>
      </div>
      <div class="col-md-4">
        <h2>Estavél:</h2>
        <?php
        for($i = 0; $i < sizeof($estavel); $i = $i + 1){
          echo "<div class='card mb-4 shadow-sm'style='background-color:#ffff80'>";
          echo "<div class='card-body'>";
          echo "<p class='card-text'>Ação: ".$estavel[$i][0]."<p class='card-text'>";
          echo "<p class='card-text'>Preço: R$".$estavel[$i][1]."<p class='card-text'>";
          echo "<p class='card-text'>Variação: ".$estavel[$i][2]."%<p class='card-text'>";
          echo "</div>";
          echo "</div>";
          echo("<br>");
        }

         ?>
      </div>
    </div>
  </body>
</html>
