<?php
	include('conn.php');
    if (isset($_POST['timeofbet']) && isset($_POST['counterno'])) {

        $dummyBetData = "[{number:12,amount:30},{number:5,amount:130},{number:2,amount:300}]"; 

        $uniqueNo = abs( crc32( uniqid() ) );
    
        $timeofbet=$_POST['timeofbet']; /** bet session ID timeofbet **/
        $betid= $uniqueNo;
        $ticketnumber= $uniqueNo;
        #$ticketnumber = FLOOR(RAND() * 40) + 100;
        $betdata =  $_POST['betdata'];
        $totallamount = 100;
        $counterno = $_POST['counterno'];
    
        mysqli_query($conn,"insert into `runtimebet` (timeofbet,betid,ticketnumber,betdata,totallamount,counterno) 
        values 
        ('$timeofbet','$betid','$ticketnumber', '$betdata', '$totallamount', '$counterno')");

        $myObj = new stdClass();
        $myObj->status = true;
        $myObj->ticketnumber = $ticketnumber;

        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    $conn->close();
 
?>