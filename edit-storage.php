<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['update']))
{
$str_no=intval($_GET['str_no']);
$str_no=$_POST['str_no'];
$nstr_no=$_POST['nstr_no'];
$str_loc=$_POST['str_loc'];
$sql="update storage set str_no=:nstr_no,str_loc=:str_loc where str_no=:str_no";
$query = $dbh->prepare($sql);
$query->bindParam(':str_no',$str_no,PDO::PARAM_STR);
$query->bindParam(':nstr_no',$nstr_no,PDO::PARAM_STR);
$query->bindParam(':str_loc',$str_loc,PDO::PARAM_STR);
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
<body style="background-image:url('img/img1.jpg');height:100%;background-position:center;background-repeat:no-repeat;">

<nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
        <div class="container">
          <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;text-decoration:none;">Inventory Management System</a>
        </div>
</nav>

<div class="container" id="add-storage-table">
    <div class="card mt-5">
      <div class="card-content">
        <div class="card-title mt-3 center">Edit Storage Of Database</div>
        <form class="col" method="POST">
          <div class="row">
            <div class="input-field col-sm">
            <?php 
            $str_no=intval($_GET['str_no']);
            $sq = "SELECT * from storage where id=:str_no";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':str_no',$str_no,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {  
            ?>   
              <input type="text" placeholder="Storage Number" name="str_no" value="<?php echo htmlentities($result->str_no);?>" required >
              <?php }} ?>
            </div>
            <div class="input-field col-sm">
              <input type="text" placeholder="New Storage Number" name="nstr_no">
            </div>
            <div class="input-field col-sm">
            <?php 
            $str_no=intval($_GET['str_no']);
            $sq = "SELECT * from storage where id=:str_no";
            $query = $dbh -> prepare($sq);
            $query->bindParam(':str_no',$str_no,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {?>
              <input type="text" placeholder="Storage Location" name="str_loc" value="<?php echo htmlentities($result->str_loc);?>" required >
              <?php }} ?>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>    
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