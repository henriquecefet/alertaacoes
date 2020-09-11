<?php
$host        = "host = ec2-54-166-107-5.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = db5pscbsc5u5km";
$credentials = "user = hmqbzhhxovmzw password=ffa8e598fe771f7b2350a22358d122abf6f87763f7ddbde9dc2d35e523b97802";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
  ?>
