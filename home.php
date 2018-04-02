
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
<div class="raw">
<div class="col-sm-2" style="background-color:lightblue">
<h1 >BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="#">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Blog</a></li>
<li class="active"><a href="home.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Home</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li><a href="about.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;About us</a></li>
<li><a href="#">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact us</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
</div>
	<div class="container">
	<div class="col-sm-10">
		<?php
		include "db_controller.php";
		if(isset($_POST["searchbutton"])) {
			$search=$_POST["search"];

			//var_dump($search);

			$sql="SELECT * FROM post WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR category LIKE '%$search%'";
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

				echo '<h4>'.$row["title"] . '</h4>';
				echo '<h4>'.$row["category"] .'</h4>';
				echo "<img src='Upload/". $row['image']."' style='width:500px; height=300px;'>";
				echo '<p style="text-align: justify;">'.$row["content"].'</p>';
				
				$name = get_name($row['user_id'], $conn);
				echo '<p> Created By - '.$name.'</p>';
				echo "<hr>";

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
	<?php require "footer.php";?>
</body>
</html>