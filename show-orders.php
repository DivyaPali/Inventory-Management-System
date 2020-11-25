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
  <title>Inventory Management System | Product</title>
</head>
<body style="background-image:url('img/img1.jpg');height:100%;background-position:center;background-repeat:no-repeat;">
  <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
    <div class="container">
      <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;text-decoration:none;">Inventory Management System</a>
    </div>
  </nav>

  <header class="header container" style="background-color:yellow;">
    <div class="row justify-content-center">
        <div><a href="./product.php" style="font-size:30px;text-decoration:none;" class="">Product</a></div>
    </div>    
  </header>

     


      <div class="container" id="view-storage-table">
    <div class="card mt-5">
      <div class="card-title center mt-3" id="product-table-caption">Order Details</div>
      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Order Number</th>
              <th>Product Name</th>
              <th>Customer Name</th>
              <th>Product Cost</th>
              <th>Address</th>
              <th>Date</th>
              <th></th>
            </tr>
          
          </thead>
          <tbody>
            <?php $sql = "SELECT * from orders as o INNER JOIN product_detail as p ON(o.p_id=p.p_id)";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
              foreach($results as $result){               
            ?>                                      
              <tr class="odd gradeX">
                <td><?php echo htmlentities($result->o_id);?></td>
                <td><?php echo htmlentities($result->p_name);?></td>
                <td><?php echo htmlentities($result->cust_name);?></td>
                <td><?php echo htmlentities($result->p_cost);?></td>
                <td><?php echo htmlentities($result->adder);?></td>
                <td><?php echo htmlentities($result->date);?></td>
              </tr>
            <?php $cnt=$cnt+1;}}?>                                      
          </tbody>
        </table>
      </div>
    </div>
  </div>  

    <!--jQuery first, then popper.js, then bootstrap js-->
  <!--build:js js/min.js -->
  <script src="js/jquery.slim.min.js" ></script>
  <script src="js/popper.min.js" ></script>
  <script src="js/bootstrap.min.js" ></script>
  <!--endbuild -->
</body>
</html>