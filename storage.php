<?php
error_reporting(0);
include('includes/config.php'); 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from storage WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
header('location:storage.php');
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
  <title>Inventory Management System | Storage</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-primary pt-5 pb-5 mb-5" style="height:150px;">
    <div class="container">
      <a href="./index.php" class="brand-logo center" style="color:white; font-size:3em;">Inventory Management System</a>
    </div>
  </nav>

  <header class="header container" style="background-color:yellow;padding:20px 0px 5px 0px;">
      <div class="row justify-content-center">
        <div><a href="#" style="font-size:30px;" class=" mr-5">Storage</a></div>
        <div style="">
        <button class="add-storage-btn btn blue darken-3 mr-2">
        <i class="fa fa-plus"></i>  <a href="./add-storage.php" style="color:black;">Add Storage</a> <!-- convert into link-->
        </button>
        </div>
        </div>
  </header>

     


      <div class="container" id="view-storage-table">
    <div class="card mt-5">
      <div class="card-title center mt-3" id="product-table-caption">Storage Details</div>
      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Storage Number</th>
              <th>Storage Location</th>
              <th></th>
            </tr>
          
          </thead>
          <tbody>
            <?php $sql = "SELECT * from storage";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
              foreach($results as $result){               
            ?>                                      
              <tr class="odd gradeX">
                <td><?php echo htmlentities($result->str_no);?></td>
                <td><?php echo htmlentities($result->str_loc);?></td>
                <td class="center">
                  <a href="edit-storage.php?str_no=<?php echo htmlentities($result->id);?>">
                    <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                  </a> 
                  <a href="storage.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');">       <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                  </a>
                </td>
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
  <script src="js/script.js"></script>
  <!--endbuild -->
</body>
</html>