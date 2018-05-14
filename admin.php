<?php
require "header.php";
require "db_controller.php";
require "session.php";
require "function.php";

if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
    date_default_timezone_set("Asia/Dhaka");
    $currenttime = time();
    //$datetime = strftime("%y-%m-%d %H:%M:%S", $currenttime);
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
    $datetime;
    $admin="saddam hossan";
    if(empty($username) || empty($password) || empty($confirmpassword)){
        $_SESSION["ErrorMessage"]='All Fields must be filled out.';
        redirect_to("admin.php");

    }elseif(strlen($password)<4) {
        $_SESSION["ErrorMessage"]="At least 4 charcter password required";
        redirect_to("admin.php");

    }elseif($password!==$confirmpassword) {
        $_SESSION["ErrorMessage"]="Confirm password doesnot match";
        redirect_to("admin.php");

    }else {
        global $conn;
        $sql="INSERT INTO admin_registation(datetime,username,password,addedby)
        VALUE('$datetime','$username','$password','$admin')";
        $execute=mysqli_query($conn,$sql);
        //(die);
        if($execute) {
            $_SESSION["SuccessMessage"]="Admin added successfully!";
            redirect_to("admin.php");
        }else {
            $_SESSION["ErrorMessage"]="Admin failed to add.";
            redirect_to("admin.php");
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
<li class="active"><a href="admin.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admin</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li><a href="category.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Categories</a></li>
<li><a href="contact.php">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
<div class="col-sm-10">
<h2>Manage Admin Access</h2>
<div>
<?php echo message();
      echo SuccessMessage();
    ?>
</div>
<div>
<form action ="admin.php" method="POST" >
<div class="form-group">
<label for="username">User Name:</label>
<input type="text" name="username" class="form-control" id="username" placeholder="Username">
</div>
<div class="form-group">
<label for="password">Password:</label>
<input type="password" name="password" class="form-control" id="password" placeholder="Password">
</div>
<div class="form-group">
<label for="confirmpassword">Confirm Password:</label>
<input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm Password">
</div>
<input class="btn btn-success" type="submit" name="submit" value="Add New Admin">
</form>
</div>
<br><br>
<div class="table-responsive">
     <table class="table table-striped table-hover">
        <tr>
            <th>Sr No.</th>
            <th>Date & Time</th>
            <th>Admin Name</th>
            <th>Added By</th>
            <th>Action</th>
        </tr>
        <?php
        require "db_controller.php";
        //global $conn, $sql;
        $sql="SELECT * FROM admin_registation ORDER BY datetime desc";
        //die();
        $execute=mysqli_query($conn,$sql);
        $SrNo=0;
        while($DataRows=mysqli_fetch_array($execute)) {
            $Id=$DataRows["id"];
            $DateTime=$DataRows["datetime"];
            $UserName=$DataRows["username"];
            $AddedBy=$DataRows["addedby"];
            $SrNo++;

        ?>
        <tr>
            <td><?php echo $SrNo; ?></td>
            <td><?php echo $DateTime; ?></td>
            <td><?php echo $UserName ?></td>
            <td><?php echo $AddedBy; ?></td>
            <td>
            <a href="DeleteAdmin.php?id=<?php echo $Id; ?>">
            <span class="btn btn-danger">Delete</span>
            </a></td>

        </tr>
        <?php } ?>
     </table>
</div>
</div>
</div>
</div>
<?php require "footer.php"?>
</body>
</html>