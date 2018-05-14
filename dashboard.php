<?php 
session_start();

require "header.php";
require "session.php";
require "function.php";
require "db_controller.php";

if(!isset($_SESSION['login'])) 
   {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head> 
   <!--<div class="Line" style="height: 10px; background: #27aae1;"></div> -->
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
    <li class="active"><a href="dashboard.php">
    <span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Dashboard</a></li>
    <li><a href="admin.php">
    <span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admin</a></li>
    <li><a href="new_post.php">
    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
    <li><a href="category.php">
    <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Category</a></li>
    <li><a href="contact.php">
    <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact</a></li>
    <li><a href="logout.php">
    <span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
    </ul>
    </div>
    <div class="col-sm-10">

    <div>
    <?php echo message();
          echo SuccessMessage();
        ?>
    </div>
    <h2>Admin Dashboard</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
               <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Banner</th>
                    <th>Category</th>
                    <th>Action</th>
                    <th>Details</th>
               </tr>
               <?php
               $conn;
               $sql="SELECT * FROM post ORDER BY id desc";
               $result=mysqli_query($conn, $sql);
               $SrNo=0;
               while($row=mysqli_fetch_array($result)) {
                   $Id=$row["id"];
                   $Title=$row["title"];
                   $Admin=$row["author"];
                   $Category=$row["category"];
                   $Image=$row["image"];
                   $Content=$row["content"];
                   $SrNo++;
                   ?>
                   <tr>
                     <td><?php echo $SrNo; ?></td>
                     <td style="color: green;"><?php
                     if(strlen($Title)>20) {$Title=substr($Title,0,25). '..';}
                     echo $Title; 
                     ?></td>
                     <td><?php echo $Admin; ?></td>
                     <td><img src="Upload/<?php echo $Image; ?>" width="100px"; height="40px"></td>
                     <td><?php echo $Category; ?></td>
                     <td>
                     <a href="EditPost.php?Edit=<?php echo $row['id']; ?>">
                     <span class="btn btn-warning">Edit</span>
                     </a>
                      <a href="DeletePost.php?Delete=<?php echo $row['id']; ?>"> 
                      <span class="btn btn-danger">Delete</span> 
                      </a>
                      </td>
                     <td>
                     <a href="FullPost.php?Preview=<?php echo $row['id']; ?>" target="_blank">
                     <span class="btn btn-primary">Live Preview</span>
                     </td>
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