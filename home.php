
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
	<title> Blog Site</title>
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
<li class="active"><a href="home.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Home</a></li>
<li><a href="service.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Service</a></li>
<li><a href="category.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Category</a></li>
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
		if(isset($_POST["searchbutton"])) {
		   /*date_default_timezone_set("Asia/Dhaka");
            $currenttime = time();
            //$datetime = strftime("%y-%m-%d %H:%M:%S", $currenttime);
            $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
            $datetime; */
			$search=$_POST["search"];

			//var_dump($search);

			$sql="SELECT * FROM post WHERE title LIKE '%$search%' OR 
			content LIKE '%$search%' OR category LIKE '%$search%'";
            }else {
            //  $sql="SELECT * FROM post";
			 $sql = "SELECT * FROM post order by id desc";
			}
		 $result = $conn->query($sql);

		 if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {
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
				
				$name = get_name($row['user_id'], $conn);
				echo '<p> Created By - '.$name.'</p>';

			}
		} else {
			echo "0 results";
		}


		function get_name($id, $conn)
		{
			$name = "";

				$name_sql = "select name from member where id =".$id.";";
				$name_result = $conn->query($name_sql);
				if ($name_result->num_rows > 0) {
					while ($name_row = $name_result->fetch_assoc()) {
						$name = $name_row['name'];
					}
				}

			return $name;
		}


		$conn->close();
		
		?>
		</div>
		</div>
	</div>
	<?php require "footer.php";?>
</body>
</html>