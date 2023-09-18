<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
 
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
</head>
<body>

    <?php 
        include('../getCounter.php')
    ?>

<div class="container-fluid p-2 bg-primary text-white text-center">
  <h1>Admin panel</h1>
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
    <table id="dataTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Counter Number</th>
                <th>Counter ID</th>
                <th>Address</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php
           // $couters = json_decode($output);
            //print_r($couters);
             for ($x = 0; $x < count($couters); $x++) {
                $seperateCounter = json_decode($couters[$x]);
                echo "<tr>
                <td>".$seperateCounter->counterno . "</td><td>".  
                 $seperateCounter->counterid . "</td><td>". 
                 $seperateCounter->addresss . "</td><td>".  
                 $seperateCounter->balance. "</td>
                </tr>"; 
              }
              ?>
        </ul>
    </div>
  </div>
</div>

</body>
<script>
    new DataTable('#dataTable');
</script>
</html>
