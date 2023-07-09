<?php
  require '../vendor/autoload.php';
  include('addWinTable.php');

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
      $sessionID= rand(106,399)."_".time();

      $data = new stdClass();
      $data->massage = "Bet session Start, BET PLEASE";
      $data->sessionId = $sessionID;
      
      $pusher->trigger('my-channel', 'my-event', $data);

      sleep(10);

      $data->massage = "No More Bet";
      $data->sessionId = $sessionID;
      $pusher->trigger('my-channel', 'my-event', $data);

      //calculate win logic
      $winerNumBer = winCacl($sessionID);
      echo "winnumber is :".$winerNumBer;

      sleep(10);
     
      $data->massage = "Session End";
      $data->sessionId = $sessionID;
      $data->winNumber = $winerNumBer;
      $pusher->trigger('my-channel', 'my-event', $data);

  }

  function winCacl($id){
      include('conn.php');
      $sql = "SELECT * FROM runtimebet WHERE timeofbet = '$id'";
      $result = $conn->query($sql);
      $allBetData=array();
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              array_push($allBetData,$row['betdata']);
          }
          $numberArr = array();
          $amountArr = array();
          for ($x = 0; $x < count($allBetData); $x++) {
              
            $dollerData = json_decode($allBetData[$x],true);
            for ($j = 0; $j < count($dollerData); $j++) {
              $num = $dollerData[$j]['number'];
              $amnt = $dollerData[$j]['amount'];
              if (in_array($dollerData[$j]['number'], $numberArr))
              {
                $indexOfMatch = array_search($dollerData[$j]['number'],$numberArr);
                $addAmount = $amountArr[$indexOfMatch] + $dollerData[$j]['amount'];
                $amountArr[$indexOfMatch] = $addAmount;
              }
              else
              {
                array_push($numberArr ,$dollerData[$j]['number']);
                array_push($amountArr ,$dollerData[$j]['amount']);
              }
              
            }
          }
         
          $getMAx = (max($amountArr));
          $indexOfMaxVal = array_search($getMAx,$amountArr);
          
          $neverStopArr = array(11,12,$numberArr[$indexOfMaxVal]);
          $wnNumBer = generateWinNUmber($neverStopArr);
          updateWintable(0,$wnNumBer,$id);
          return $wnNumBer;

      } else {
          echo "No results found.";
      }

      $conn->close();
      
  }

  function generateWinNUmber($arr){
    $winNumber = rand(1,10);
    $nm = $winNumber;
    if (in_array($winNumber, $arr)){
      $nm = generateWinNUmber($arr);
      echo "gelo";
    }
    return $nm;
  }

  betStart($pusher);
 
?>