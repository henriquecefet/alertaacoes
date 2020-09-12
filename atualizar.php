<?php
include("conexao.php");
$sql =<<<EOF
   SELECT * from acoes.acoes;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) {
     echo pg_last_error($db);
 exit;
}
while($row = pg_fetch_row($ret)) {
  $url  = "http://api.hgbrasil.com/finance/stock_price?key=8a9cc248&symbol=".$row[0];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  curl_close($ch);
  $dados = json_decode($result, true);
  $nome = $dados['results'][$row[0]]['symbol'];
  $preco = $dados['results'][$row[0]]['price'];
  $variacao = $dados['results'][$row[0]]['change_percent'];
  if($variacao>1){
    $recomendacao = 1; // vender
  }
  elseif($variacao<-1){
    $recomendacao = 2; // comprar
  }
  else{
      $recomendacao = 3; // estável
  }
  $sql =<<<EOF
     UPDATE acoes.acoes SET preco = $preco, variacao = $variacao, recomendacao = $recomendacao where nome = $nome;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
       echo pg_last_error($db);
       exit;
  }
  else{
    echo "Banco atualizado";
  }

}
//var_dump($comprar);
pg_close($db);
?>
