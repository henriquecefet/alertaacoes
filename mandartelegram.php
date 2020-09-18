<?php
include("conexao.php");
include("funcaotelegram.php");
$chatids = array();
$sql2 =<<<EOF
   SELECT * from acoes.usuarios;
EOF;
$ret2 = pg_query($db, $sql2);
if(!$ret) {
     echo pg_last_error($db);
}
while($row2 = pg_fetch_row($ret2)) {
    array_push($chatids, $row2[0]);
}
$sql1 =<<<EOF
   SELECT * from acoes.acoes;
EOF;
$ret1 = pg_query($db, $sql1);
if(!$ret1) {
     echo pg_last_error($db);
 exit;
}
while($row = pg_fetch_row($ret1)) {
  for($i = 0; $i < sizeof($chatids); $i = $i + 1){
    if($row[2]>3){
        telegram("Recomendação de venda: ".$row[0].", com preço de R$".$row[1]." e variação de ".$row[2]."%",$chatids[$i]);
      }


    elseif($row[2]<-3){
      telegram("Recomendação de compra: ".$row[0].", com preço de R$".$row[1]." e variação de ".$row[2]."%",$chatids[$i]);
    }
  }

}
//var_dump($comprar);
pg_close($db);
 ?>
