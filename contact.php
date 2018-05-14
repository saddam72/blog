
<?php
require "header.php";
require "db_controller.php";
//require "google-map.php";
$msg=array();
if ($_POST) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $sql="INSERT INTO member(id, name, email, mobile, password) VALUES('', '$name', '$email', '$mobile', '$password')";
  //die($sql);
  if (mysqli_query($conn, $sql))
  {
    $msg[]='<div class="alert alert-success" role="alert">Register is successfull!</div>';
  } else {
    $msg[]='<div class="alert alert-danger" role="alert"><strong>Sorry</strong> Register is not successfully!</div>';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Contact us</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="style.css"/>  
</head>
<body>
<div class ="container-fluid">
<div class="raw">
<div class="col-md-2" style="background-color:lightblue">
<h1>BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="home.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Home</a></li>
<li><a href="service.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Service</a></li>
<li><a href="category.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Category</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li><a href="about.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;About us</a></li>
<li class="active"><a href="contact.php">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact us</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
</div>
<section class="container">
<div id="map"></div>
 <div class="col-md-8 col-md-10">
 <h2><span class="text-primary">Contact Us</span></h2>
  <div>
  <h3>Google Map</h3>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZB_7pxtKncpADOpgYssFf772nyDwAb_E&callback=loadMap">
    </script>
     </div>
    <div class="panel-heading">
      <?php foreach ($msg as $key => $value) 
      {
        echo $value;
      } 
      ?>
      <div class="panel-body">
        <form action="contact.php" method="POST">
          <h4><span class="text-primary">Contact Form</span></h4>
          <div class="form-group">
           <label for="text"><span class="text-warning">Name:</span></label>
           <div class="input-group">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-user text-info"></span>
			</span>
           <input type="name" name="name" class="form-control" id="name" placeholder="Name" required>
         </div>
         </div>
         <div class="form-group">
           <label for="email"><span class="text-warning">Email:</span></label>
           <div class="input-group">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-envelope text-info"></span>
			</span>
           <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
         </div>
         </div>
         <div class="form-group">
           <label for="email"><span class="text-warning">Subject:</span></label>
           <div class="input-group">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-font awesome text-info"></span>
			</span>
           <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
         </div>
         </div>
         <div class="form-group">
            <label for="message"><span class="text-warning">Message:</span></label>
            <textarea name="message" class="form-control" rows="5" id="message"></textarea>
          </div>           
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>
</section>
<br>
<?php require "footer.php";?>
</body>
</html>
