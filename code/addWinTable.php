<?php
//$timeOfBet == Session ID
function updateWintable($betID,$winamount, $timeOfBet){
    include('conn.php');
    mysqli_query($conn,"insert into `wintable` (betid,winticket,timeofbet,counterno) 
        values 
        ('$betID','$winamount','$timeOfBet', '0')");

    $conn->close();
}
	
 
?>