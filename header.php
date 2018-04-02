<?php
/*require_once "db_controller.php";

if(isset($_POST["searchbutton"])) {
  $search=$_POST["search"];
  $sql="SELECT * FROM post WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR category LIKE '%$search%'";
}else {
  $sql="SELECT * FROM post";
}
$sql = mysqli_query($conn, $sql);
while($DataRows=mysqli_fetch_array($sql)){
  $title=$DataRows['title'];
  $content=$DataRows['content'];
  $category=$DataRows['category'];
}*/
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Blog Site</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="style.css"/>   
 <style>
 .form {
   margin-top: 50%;
   width: 40px;
   margin-right: 100%;
 }
 </style>
</head>
<body>
	<header>
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><strong>Wellcome to our blogsite</strong></a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Service</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="#">Contuct us</a></li>
      </ul>
      <div class="row" style="text-align: right; padding: 10px;">
        <form class="form-inline" action="home.php" method="POST">
          <input class="form-control" type="text" name="search" placeholder="Search">
          <button class="btn btn-success glyphicon glyphicon-search" name="searchbutton"></button>
        </form>
      </div>
    </div>
  </nav>
  <!-- <div class="Line" style="height: 10px; background: #27aae1;"></div> -->
</header>
</body>
</html>