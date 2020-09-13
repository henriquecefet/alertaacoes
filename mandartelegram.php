<?php
$telegrambot='1119671047:AAFTHvMowYex6dRol8_-d1eHy3kbe3Siv_o';
$telegramchatid=1037497721;
function telegram($msg) {
        global $telegrambot,$telegramchatid;
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}
function pegarDadosBolsa(){
  $sql =<<<EOF
     SELECT * from acoes.acoes;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
       echo pg_last_error($db);
   exit;
  }
  while($row = pg_fetch_row($ret)) {
    $acao =  array(, , );
    if($row[2]>1){
      telegram("Recomendação de venda: \n
      Ação: ".$row[0]."\n
      Preço: ".$row[1]."\n
      Variação "$row[2]);
    }
    elseif($row[2]<-1){
      telegram("Recomendação de Compra: \n
      Ação: ".$row[0]."\n
      Preço: ".$row[1]."\n
      Variação "$row[2]);
      }
    }
  }
  pegarDadosBolsa()
 ?>
