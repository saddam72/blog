<?php 
session_start();

require "header.php";

if(!isset($_SESSION['login'])) 
{
	header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Full Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
<div class ="container-fluid">
<div class="raw">
<div class="col-sm-2" style="background-color:lightblue">
<h1 >BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="dashboard.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Dashboard</a></li>
<li><a href="admin.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Admin Manage</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li><a href="about.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;About us</a></li>
<li><a href="contact.php">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact us</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
</div>
	<div class="container-fluid">
	<div class="col-sm-10">
		<?php
        include "db_controller.php";
        
             $PreviewFromURL=$_GET['Preview'];
		     $sql="SELECT * FROM post";
          
		     $result = mysqli_query($conn, $sql);

		      $row = mysqli_fetch_array($result);
				// echo "<pre>";
				// var_dump($row);
				// die();
				// echo "</pre>";
				 $title=$row['title'];
				 $content=$row['content'];
				 $category=$row['category'];
				 $datetime=$row['datetime'];

				echo "<br>";
				echo '<h4>'.$row["title"] . '</h4>';
				echo "<hr>";
				echo '<h5>'.$row["category"] .'</h5>';
				echo "<img src='Upload/". $row['image']."' style='width:500px; height=300px;'><br><br>";
				echo $row['datetime'];
				echo "<div align='justify'>";
				echo '<p style="Font-size: 80px;">'.$row["content"].'</p>';
                echo "</div>";
                

               $SearchQueryParameter=$_GET['Preview'];
               $sql="SELECT * FROM post WHERE id='$SearchQueryParameter'";
               $ResultSql=mysqli_query($conn, $sql);
               while($row=mysqli_fetch_array($ResultSql)) {
               $TitleToBeUpdated=$row['title'];
               $CategoryToBeUpdated=$row['category'];
               $ImageToBeUpdated=$row['image'];
               $ContentToBeUpdated=$row['content'];
   
               }
		
		?>
		</div>
		</div>
	</div>
	<?php require "footer.php";?>
</body>
</html>