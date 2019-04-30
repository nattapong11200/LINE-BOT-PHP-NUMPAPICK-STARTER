 <?php
  

function send_LINE($msg){
 $access_token = 'tYSCNQ/SHUpH8UuIgm60rl+Wv5P++2ai2/AbJYEYBXEllRHw29lifIaexiPHki7jQD3cjQNp1PDfob1joHuZVq79sdcOrHd8sPHTaklk+ASq99Tbv7UJuNp35Emtvhie/K9D0QrWX43efhPPduxdKgdB04t89/1O/w1cDnyilFU=
'; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [

        'Userid ' => 'U25b957160460cc73ee9487afc2dccad0',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
