<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['update'])) //not working
{
$p_id=intval($_GET['p_id']);
$p_id=$_POST['p_id'];
$np_id=$_POST['np_id'];
$p_name=$_POST['p_name'];
$p_cost=$_POST['p_cost'];
$p_qty=$_POST['p_qty'];
$str_no=$_POST['str_no'];
$sql="update product_detail set p_id=:np_id,p_name=:p_name,p_cost=:p_cost,p_qty=:p_qty,str_no=:str_no where p_id=:p_id";
$query = $dbh->prepare($sql);
$query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
$query->bindParam(':np_id',$np_id,PDO::PARAM_STR);
$query->bindParam(':p_name',$p_name,PDO::PARAM_STR);
$query->bindParam(':p_cost',$p_cost,PDO::PARAM_STR);
$query->bindParam(':p_qty',$p_qty,PDO::PARAM_STR);
$query->bindParam(':str_no',$str_loc,PDO::PARAM_STR);
$query->execute();
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"></meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Inventory Management System | Modify Products</title>
</head>
<body>

<nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
        <div class="container">
          <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;">Inventory Management System</a>
        </div>
</nav>

<div class="container" id="add-storage-table">
    <div class="card mt-5">
      <div class="card-content">
        <div class="card-title mt-3 center">Edit Product Of Database</div>
        <form class="col" method="POST">
          <div class="row">
            <div class="input-field col-sm">
            <?php 
            $p_id=intval($_GET['p_id']);
            $sq = "SELECT * from product_detail where id=:p_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {  
            ?>   
              <input type="number" placeholder="Product Id" name="p_id" value="<?php echo htmlentities($result->p_id);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="New Product Id" name="np_id">
            </div>
            <div class="input-field col-sm">
            <?php 
            $p_id=intval($_GET['p_id']);
            $sq = "SELECT * from product_detail where id=:p_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="text" placeholder="Product Name" name="p_name" value="<?php echo htmlentities($result->p_name);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $p_id=intval($_GET['p_id']);
            $sq = "SELECT * from product_detail where id=:p_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="number" placeholder="Product Cost" name="p_cost" value="<?php echo htmlentities($result->p_cost);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $p_id=intval($_GET['p_id']);
            $sq = "SELECT * from product_detail where id=:p_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="number" placeholder="Product Quantity" name="p_qty" value="<?php echo htmlentities($result->p_qty);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $p_id=intval($_GET['p_id']);
            $sq = "SELECT * from product_detail where id=:p_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="text" placeholder="Storage Number" name="str_no" value="<?php echo htmlentities($result->str_no);?>" required >
              <?php }} ?>
            </div>
            <button type="submit" name="update" class="btn btn-info">Update</button>  
            <button class="btn orange ml-2"><a href="./product.php">Back</a></button>        
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