 <?php
  

function send_LINE($msg){
 $access_token = 'pgfL26vbIBVgn5uh0mS5GSxwrpc+cA/uWv8DUhwhP06T//ZPWYK4QQ8WLmyvPqQqQD3cjQNp1PDfob1joHuZVq79sdcOrHd8sPHTaklk+ARsleL7Tr7/41iuTyuqzKKUblHuj5pX6TpUgFj8d1JO7AdB04t89/1O/w1cDnyilFU='; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://nuttapongaass.herokuapp.com/callback';
      $data = [

        'Userid' => 'U25b957160460cc73ee9487afc2dccad0',
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
