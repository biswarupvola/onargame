<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
        <ul>
            <?php
           // $couters = json_decode($output);
            //print_r($couters);
             for ($x = 0; $x < count($couters); $x++) {
                $seperateCounter = json_decode($couters[$x]);
                echo $seperateCounter->addresss . "<br>";  
                echo $seperateCounter->balance . "<br>";   
                echo $seperateCounter->counterid. "<br>"; 
              }
              ?>
        </ul>
    </div>
  </div>
</div>

</body>
</html>
