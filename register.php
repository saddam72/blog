
<?php
require "db_controller.php";
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
 <title>Register</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="style.css"/>    
</head>
<body>
  <header>
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="login.php">Wellcome to our blogsite</a>
      </div>
      <ul class="nav navbar-nav">
      </ul>
    </div>
  </nav>
</header>
<section class="container">
 <div class="col-md-8 col-md-offset-2">
  <br>
   <div class="panel panel-success">
    <div class="panel-heading">
      <?php foreach ($msg as $key => $value) 
      {
        echo $value;
      } 
      ?>
      <div class="panel-body">
        <form action="register.php" method="POST">
          <h4>Register Form</h4>
          <div class="form-group">
           <label for="text">UserName:</label>
           <div class="input-group">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-user text-info"></span>
								</span>
           <input type="name" name="name" class="form-control" id="name" placeholder="User Name" required>
         </div>
         </div>
         <div class="form-group">
           <label for="email">Email:</label>
           <div class="input-group">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope text-info"></span>
								</span>
           <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
         </div>
         </div>
         <div class="form-group">
           <label for="email">Mobile:</label>
           <div class="input-group">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone-alt text-info"></span>
						</span>
           <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number">
         </div>
         </div>
         <div class="form-group">
          <label for="password">Password:</label>
          <div class="input-group">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock text-info"></span>
								</span>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        </div>
        <button type="submit" class="btn btn-success">Register</button>
        Already have an account <a href="login.php">Please Login</a>
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
