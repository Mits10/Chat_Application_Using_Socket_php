<?php
$host= "127.0.0.1";
$port= 20205;
set_time_limit(0);
$sock = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n");
$result = socket_bind($sock,$host,$port) or die ("Could not bind to socket\n");
$result = socket_listen($sock,3) or die("could not set up socket listner\n");
echo "Listening for connections";

class Chat
{
  function readline()
  {
    return rtrim(fgets(STDIN));
  }
  public function onMessage($from, $msg) {
    $count=0;
    foreach($clients as $client){
      $count++;
    }
      $numRecv = $count - 1;
      echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
          , $from, $msg, $numRecv, $numRecv == 1 ? '' : 's');

      foreach ($clients as $client) {
          if ($from !== $client) {
              // The sender is not the receiver, send to each client connected
              $client->send($msg);
          }
      }
  }
}
$clients=array();



do {
  // code...
  $read = array();
    $read[] = $sock;

    $read = array_merge($read,$clients);

    // Set up a blocking call to socket_select
    if(socket_select($read,$write = NULL, $except = NULL, $tv_sec = 5) < 1)
    {
        //    SocketServer::debug("Problem blocking socket_select?");
        continue;
    }
    // Handle new Connections
    if (in_array($sock, $read)) {

        if (($msgsock = socket_accept($sock)) === false) {
            echo "Could not accept incoming connection" . socket_strerror(socket_last_error($sock)) . "\n";
            break;
        }
        $clients[] = $msgsock;
        $key = array_keys($clients, $msgsock);
        $msg= socket_read($msgsock,1024) or die("Could not read input\n");
        $msg_1= trim($msg);
        echo "Client says:\t".$msg_1."\n\n";

    }

  //$accept= socket_accept($sock) or die ("could not accept incoming connection.");
  //$msg= socket_read($accept,1024) or die("Could not read input\n");

  //$msg= trim($msg);
  //echo "Client says:\t".$msg."\n\n";

  line = new Chat();
  $send= $line->onMessage($msgsock,$msg);
  //echo "Enter Reply:\t";
  //$reply = $line->readline();

  //socket_write($accept,$reply,strlen($reply)) or die ("Could not write output\n");

}while (true);
socket_close($accept,$sock);

 ?>
