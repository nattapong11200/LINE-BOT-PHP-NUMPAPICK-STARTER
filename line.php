 <?php
  


define(‘LINE_API’,”https://notify-api.line.me/api/notify");
 
$token = “tYSCNQ/SHUpH8UuIgm60rl+Wv5P++2ai2/AbJYEYBXEllRHw29lifIaexiPHki7jQD3cjQNp1PDfob1joHuZVq79sdcOrHd8sPHTaklk+ASq99Tbv7UJuNp35Emtvhie/K9D0QrWX43efhPPduxdKgdB04t89/1O/w1cDnyilFU=
”;
$str = “Hello”; 
 
$res = notify_message($str,$token);
print_r($res);
function notify_message($message,$token){
 $queryData = array(‘message’ => $message);
 $queryData = http_build_query($queryData,’’,’&’);
 $headerOptions = array( 
         ‘http’=>array(
            ‘method’=>’POST’,
            ‘header’=> “Content-Type: application/x-www-form-urlencoded\r\n”
                      .”Authorization: Bearer “.$token.”\r\n”
                      .”Content-Length: “.strlen($queryData).”\r\n”,
            ‘content’ => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}

?>
