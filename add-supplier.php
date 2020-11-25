<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['add'])) //add - submit button
{
  $s_id=$_POST['s_id'];
  $s_name=$_POST['s_name'];
  $p_id=$_POST['p_id'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  $sql="INSERT INTO supplier(s_id,s_name,p_id,contact,address) VALUES(:s_id,:s_name,:p_id,:contact,:address)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
  $query->bindParam(':s_name',$s_name,PDO::PARAM_STR);
  $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
  $query->bindParam(':contact',$contact,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
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
    <title>Inventory Management System | Add Supplier</title>

</head>
<body style="background-image:url('img/img1.jpg');height:100%;background-position:center;background-repeat:no-repeat;">
    <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
        <div class="container">
          <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;text-decoration:none;">Inventory Management System</a>
        </div>
    </nav>

    <div class="container">
    <div class="card mt-5">
      <div class="card-content">
        <div class="card-title mt-3 center">Add Supplier To Database</div>
        <form class="col" method="POST">
          <div class="row">
          <div class="input-field col-sm">
              <input type="number" placeholder="Supplier Id" name="s_id">
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="Supplier Name" name="s_name">
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="Product Id" name="p_id">
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="Contact" name="contact">
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="Address" name="address">
            </div>
            <button type="submit" name="add" class="btn btn-success mr-2">Add</button> 
            <button class="btn btn-secondary ml-2"><a href="./supplier.php" style="text-decoration:none;color:white;">Back</a></button>         
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

