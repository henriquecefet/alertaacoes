<?php
include("conexao.php");
function telegram($msg, $telegramchatid) {
        $telegrambot='1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o';
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}
function mandarAcoesParaUmaPessoa($chatid){
  $sql1 =<<<EOF
     SELECT * from acoes.acoes;
EOF;
  $ret1 = pg_query($db, $sql1);
  if(!$ret1) {
       echo pg_last_error($db);
       telegram("erro",$chatid);
       telegram(pg_last_error($db),$chatid);
   exit;
  }
  while($row = pg_fetch_row($ret1)) {
      if($row[2]>3){
          telegram("Recomendação de venda: ".$row[0].", com preço de R$".$row[1]." e variação de ".$row[2]."%",$chatid);
        }


      elseif($row[2]<-3){
        telegram("Recomendação de compra: ".$row[0].", com preço de R$".$row[1]." e variação de ".$row[2]."%",$chatid);
      }
  }
}
function adicionarChat($chatid){
  $sql =<<<EOF
     INSERT INTO acoes.usuarios (chatid) VALUES ('$chatid');
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
       echo pg_last_error($db);
  }
  else{
    telegram("Seu numero foi registrado. Você receberá recomendações de ações.",$chatid);
  }
}

 ?>
