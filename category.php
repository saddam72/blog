<?php 

session_start();
require "header.php";
require "db_controller.php";
require "session.php";
require "function.php";

if(isset($_POST['submit'])){
    $category=mysqli_real_escape_string($conn,$_POST['category']);
    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $dateTime = strftime("%y-%m-%d %H:%M:%S",$currentTime);
    $dateTime;
    $admin="saddam hossan";
    if(empty($category)){
        $_SESSION["ErrorMessage"]='All Fields must be filled out.';
        redirect_to("category.php");
    }elseif(strlen($category)>99) {
        $_SESSION["ErrorMessage"]="Too long name for Category.";
        redirect_to("category.php");
    }else {
        global $conn;
        $sql="INSERT INTO category(datetime,name,creatorname)
        VALUE('$datetime','$category','$admin')";
        $execute=mysqli_query($conn,$sql);
        //(die);
        if($execute) {
            $_SESSION["SuccessMessage"]="Category added successfully!";
            redirect_to("category.php");
        }else {
            $_SESSION["ErrorMessage"]="Category failed to add.";
            redirect_to("category.php");
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
<head> 
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css"/>
<style>
body{
    background-color: ;
}
.col-sm-10{
    background-color: ;
}
</style>   
</head>
<body>
<div class ="container-fluid">
<div class="raw">
<div class="col-sm-2" style="background-color:lightblue">
<h1>BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="dashboard.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Dashboard</a></li>
<li><a href="#">
<span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admin</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li class="active"><a href="dashboard.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Categories</a></li>
<li><a href="#">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Comments</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
<div class="col-sm-10">
<h2>Manage Categories</h2>
<div>
<?php echo message();
      echo SuccessMessage();
    ?>
</div>
<form action ="category.php" method="POST" >
<div class="form-group">
<label for="categoryname">Name:</label>
<input type="text" name="category" class="form-control" id="categoryname" placeholder="Name">
</div>
<input class="btn btn-success" type="submit" name="submit" value="Add New Category">
</form>
</div>
<div class="table-responsive">
     <table class="table table-striped table-hover">
        <tr>
            <th>Sr No.</th>
            <th>Date & Time</th>
            <th>Category Name</th>
            <th>Creator Name</th>
        </tr>
        <?php
        require "db_controller.php";
        //global $conn, $sql;
        $sql="SELECT * FROM category";
        //die();
        $execute=mysqli_query($conn,$sql);
        $SrNo=0;
        while($DataRows=mysqli_fetch_array($execute)) {
            $Id=$DataRows["id"];
            $DateTime=$DataRows["datetime"];
            $CategoryName=$DataRows["name"];
            $CreatorName=$DataRows["creatorname"];
            $SrNo++;

        ?>
        <tr>
            <td><?php echo $Id; ?></td>
            <td><?php echo $DateTime; ?></td>
            <td><?php echo $CategoryName ?></td>
            <td><?php echo $CreatorName; ?></td>
        </tr>
        <?php } ?>
     </table>

</div>
</div>
</div>
<?php require "footer.php"?>
</body>
</html>