<?php
	include('conn.php');
    
    $result = mysqli_query($conn,"SELECT * FROM countertable ");
    $couters = array();
  
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($couters,json_encode($row));
    }
    } else {
        echo "[]";
    }
    
    $conn->close();
 
?>