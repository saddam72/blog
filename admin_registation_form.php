<?php
require "db_controller.php";
$msg=array();
if ($_POST) {
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$sql="INSERT INTO admin_registation_form(id, name, email, mobile, password, gender, address) VALUES('', '$name', '$email', '$mobile', '$password', '$gender', '$address')";
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
<title>Admin Register Form</title>
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
    <a class="navbar-brand" href="admin_registation_form.php">Wellcome to our blogsite</a>
    </div>
    <ul class="nav navbar-nav">
    </ul>
</div>
</nav>
</header>
<section class="container">
<div class="col-md-10 col-md-offset-1">
<br>
<div class="panel panel-success">
<div class="panel-heading">
    <?php foreach ($msg as $key => $value) 
    {
    echo $value;
    } 
    ?>
    <div class="panel-body">
    <form action="admin_registation_form.php" method="POST">
        <h4>Admin Registation Form</h4>
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
        <label for="email">MobileNumber:</label>
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
        <div class="form-group">
        <label for="gender">Gender:</label>
        <div class="input-group">
        <label class="radio-inline">
        <input type="radio" name="gender" id="gender" required> Male
        </label>
        <label class="radio-inline">
        <input type="radio" name="gender" id="gender" required> Female
        </label>
        <label class="radio-inline">
        <input type="radio" name="gender" id="gender" required> Others
        </label>
        </div>
        </div>
        <div class="form-group">
        <label for="address">Address:</label>
        <textarea name="address" class="form-control" rows="3" id="address" id="editor"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Registation</button>
        Already have an account <a href="login.php"><strong>Please Login</strong></a>
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
