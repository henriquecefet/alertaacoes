<?php
include("conexao.php");
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
telegram("Sou um robô");
 ?>
