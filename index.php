<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"></meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Inventory Management System</title>
</head>
<body style="background-image:url('img/img1.jpg');height:100%;background-position:center;background-repeat:no-repeat;">
  <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
    <div class="container">
      <a href="#" class="brand-logo center" style="color:white;font-size:3em;text-decoration:none;">Inventory Management System</a>
    </div>
  </nav>

  <header class="header container" style="background-color:yellow;">
      <div class="row justify-content-center">
        <div><a href="./storage.php" style="font-size:20px;text-decoration:none;" class="mr-5">Storage</a></div>
        <div><a href="./product.php" style="font-size:20px;text-decoration:none;" class="mr-5">Products</a></div>
        <div><a href="./supplier.php" style="font-size:20px;text-decoration:none;" class="mr-5">Supplier</a></div>
      </div>
  </header>

<footer class="footer" style="margin-top:200px;">
<div class="container">
  <div class="row justify-content-center">  
    <div class="card mr-5" style="height:200px;width:200px;">
      <div class="card-body center" style="font-size:20px;opacity:o.9;font-weight:20%;padding-top:50px;color:gray;">Total Storage
      <div style="margin-top:10px;">
      <?php $sql = "SELECT * from storage";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $result=$query->rowCount(); 
            echo htmlentities($result);            
        ?> 
      </div>
      </div>
    </div>
   <div class="card mr-5" style="height:200px;width:200px;">
      <div class="card-body center" style="font-size:20px;opacity:o.9;font-weight:20%;padding-top:50px;color:gray;">Total Products
      <div style="margin-top:10px;"> <?php $sql = "SELECT * from product_detail";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $result=$query->rowCount(); 
            echo htmlentities($result);            
        ?></div>
      </div>
    </div>
    <div class="card mr-5" style="height:200px;width:200px;">
      <div class="card-body center" style="font-size:20px;opacity:o.9;font-weight:20%;padding-top:50px;color:gray;">Total Supplier
      <div style="margin-top:10px;"> <?php $sql = "SELECT * from supplier";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $result=$query->rowCount(); 
            echo htmlentities($result);            
        ?></div></div>
    </div>
  </div>
    
  </div>
</footer>
  

  <!--jQuery first, then popper.js, then bootstrap js-->
  <!--build:js js/min.js -->
  <script src="js/jquery.slim.min.js" ></script>
  <script src="js/popper.min.js" ></script>
  <script src="js/bootstrap.min.js" ></script>
  <!--endbuild -->
</body>
</html>