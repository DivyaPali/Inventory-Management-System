<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['add'])) //add - submit button name
{
  $s_id=$_POST['s_id'];
  $s_name=$_POST['s_name'];
  $p_id=$_POST['p_id'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  $sql="INSERT INTO supplier(s_id,s_name,p_id,contact,address) VALUES(:s_id,:s_name,:p_id,:contact,:address)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':s_id',$p_id,PDO::PARAM_STR);
  $query->bindParam(':s_name',$p_name,PDO::PARAM_STR);
  $query->bindParam(':p_id',$p_cost,PDO::PARAM_STR);
  $query->bindParam(':contact',$p_qty,PDO::PARAM_STR);
  $query->bindParam(':address',$str_no,PDO::PARAM_STR);
  $query->execute();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Inventory Management System | Add suppliers</title>

</head>
<body>
    <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
        <div class="container">
          <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;">Inventory Management System</a>
        </div>
    </nav>

    <div class="container" id="add-supplier-table">
    <div class="card mt-5">
      <div class="card-content">
        <div class="card-title mt-3 center">Add supplier To Database</div>
        <form class="col" method="POST">
          <div class="row">
          <div class="input-field col-sm">
              <input type="number" placeholder="supplier Id" name="s_id">
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="Supplier Name" name="s_name">
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="Product Id" name="p_id">
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="Contact No" name="contact">
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="Address" name="address">
            </div>
            <button type="submit" name="add" class="btn btn-info">Add</button> 
            <button class="btn orange ml-2"><a href="./supplier.php">Back</a></button>         
          </div>
        </form>
      </div>
    </div>
    </ul>
  </div>


    <!--jQuery first, then popper.js, then bootstrap js-->
     <!--build:js js/min.js -->
     <script src="js/jquery.slim.min.js" ></script>
     <script src="js/popper.min.js" ></script>
     <script src="js/bootstrap.min.js" ></script>
    
     <!--endbuild -->

</body>
</html>

