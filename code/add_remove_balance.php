<?php
	include('conn.php');
    if (isset($_POST['counterno'])) {

        $dummyJSON = "{counterno:1,addresss:'narayanpur',balance:'500000'}";

        $counterid = "C".abs( crc32( uniqid() ) ); //unique number
        $counterno = $_POST['counterno'];
        $balance= $_POST['balance'];
        
        mysqli_query($conn,"insert into `countertable` (counterid,counterno,addresss,balance,isactive) 
        values 
        ('$counterid','$counterno','$addresss', '$balance', '$isactive')");

        $myObj = new stdClass();
        $myObj->status = true;

        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }else{
        echo "error";
    }

    $conn->close();
 
?>