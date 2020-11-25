<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['add'])) //add - submit button
{
$str_no=$_POST['str_no'];
$str_loc=$_POST['str_loc'];
$sql="INSERT INTO storage(str_no,str_loc) VALUES(:str_no,:str_loc)";
$query = $dbh->prepare($sql);
$query->bindParam(':str_no',$str_no,PDO::PARAM_STR);
$query->bindParam(':str_loc',$str_loc,PDO::PARAM_STR);
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
    <title>Inventory Management System | Add Storage</title>

</head>
<body style="background-image:url('img/img1.jpg');height:100%;background-position:center;background-repeat:no-repeat;">
    <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
        <div class="container">
          <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;text-decoration:none;">Inventory Management System</a>
        </div>
    </nav>

    <div class="container" id="add-storage-table">
    <div class="card mt-5">
      <div class="card-content">
        <div class="card-title mt-3 center">Add Storage To Database</div>
        <form class="col" method="POST">
          <div class="row">
            <div class="input-field col-sm">
              <input type="text" placeholder="Storage Number" name="str_no">
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="Storage Location" name="str_loc">
            </div>
            <button type="submit" name="add" class="btn btn-success">Add</a></button>    
            <button class="btn btn-secondary ml-2"><a href="./storage.php" style="text-decoration:none;color:white;">Back</a></button>       
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

