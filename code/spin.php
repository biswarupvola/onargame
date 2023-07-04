<?php
  require '../vendor/autoload.php';

  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '077746d0fdbd2855e8ac',
    '696605faa9484d4ada9f',
    '1629349',
    $options
  );

    function betStart($pusher){
        $t=time();
        echo(date("Y-m-d",$t));
        $data = '{"massage":"Bet session Start, BET PLEASE","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data);

        sleep(10);

        $data2 = '{"massage":"No More Bet","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data2);

        sleep(10);

        $data3 = '{"massage":"Spinnn.............","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data3);

    }

    betStart($pusher)
 
?>