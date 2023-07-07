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
        $t="1688742709";//time();
        echo(date("Y-m-d",$t));
        $data = '{"massage":"Bet session Start, BET PLEASE","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data);

        //sleep(10);

        $data2 = '{"massage":"No More Bet","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data2);
        //calculate win logic
        winCacl($t);
        //sleep(10);
        $data3 = '{"massage":"Spinnn.............","sessionId":'.$t.'}';
        $pusher->trigger('my-channel', 'my-event', $data3);

    }

    function winCacl($id){
        include('conn.php');
        $sql = "SELECT * FROM runtimebet WHERE timeofbet = $id";
        $result = $conn->query($sql);
        $allBetData=array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($allBetData,$row['betdata']);
            }
            //print_r($allBetData);
            for ($x = 0; $x < count($allBetData); $x++) {
               
              // echo "<br>The number is: $x <br>";
              // print_r($allBetData[$x]);
              echo "<br>".gettype($allBetData[$x])."<br>";

              $dollerData = json_decode($allBetData[$x],true);
              //print_r($dollerData);

              for ($j = 0; $j < count($dollerData); $j++) {

                //echo "The number is: $x <br>";
                print_r($dollerData[$j]);

                // $amount = $allBetData[$x][$j]['amount'];
                // echo "<br> hello : $amount<br>";
              }
            }
        } else {
            echo "No results found.";
        }
       
    }

    betStart($pusher);
 
?>