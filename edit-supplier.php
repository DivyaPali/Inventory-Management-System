<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['update']))
{
$s_id=intval($_GET['s_id']);
$s_id=$_POST['s_id'];
$ns_id=$_POST['ns_id'];
$s_name=$_POST['s_name'];
$p_id=$_POST['p_id'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$sql="update supplier set s_id=:ns_id,s_name=:s_name,p_id=:p_id,contact=:contact,address=:address where s_id=:s_id";
$query = $dbh->prepare($sql);
$query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
$query->bindParam(':ns_id',$ns_id,PDO::PARAM_STR);
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
  <meta charset="UTF-8"></meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Inventory Management System | Modify Supplier</title>
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
        <div class="card-title mt-3 center">Edit Supplier Of Database</div>
        <form class="col" method="POST">
          <div class="row">
            <div class="input-field col-sm">
            <?php 
            $s_id=intval($_GET['s_id']);
            $sq = "SELECT * from storage where id=:s_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {  
            ?>   
              <input type="number" placeholder="Supplier Id" name="s_id" value="<?php echo htmlentities($result->s_id);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
              <input type="number" placeholder="New Supplier Id" name="ns_id">
            </div>
            <div class="input-field col-sm">
            <?php 
            $s_id=intval($_GET['s_id']);
            $sq = "SELECT * from supplier where id=:s_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="text" placeholder="Supplier Name" name="s_name" value="<?php echo htmlentities($result->str_loc);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $s_id=intval($_GET['s_id']);
            $sq = "SELECT * from supplier where id=:s_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="number" placeholder="Product Id" name="p_id" value="<?php echo htmlentities($result->p_id);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $s_id=intval($_GET['s_id']);
            $sq = "SELECT * from supplier where id=:s_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="number" placeholder="Contact No" name="contact" value="<?php echo htmlentities($result->contact);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
            <?php 
            $s_id=intval($_GET['s_id']);
            $sq = "SELECT * from supplier where id=:s_id";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':s_id',$s_id,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="text" placeholder="Address" name="address" value="<?php echo htmlentities($result->address);?>" required >
              <?php }} ?>
            </div>
            <button type="submit" name="update" class="btn btn-info">Update</button>    
            <button class="btn orange ml-2"><a href="./storage.php">Back</a></button>      
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