<?php 

session_start();

if (isset($_SESSION['login'])) 
{
	header('location: home.php');
}

?>
<?php
require "db_controller.php";
$msg=array();

if ($_POST) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql="SELECT * FROM member WHERE email='".$email."' and password='".$password."' ";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
		$msg[]='<div class="alert alert-success" role="alert">Email and Password correct</div>';

		while($row = mysqli_fetch_assoc($result)) 
		{
			// die($row);

			$_SESSION['user_id'] = $row["id"];
		}
		
		$_SESSION['login'] = "yes";

		header('location: home.php');

	} else {
		$msg[]='<div class="alert alert-danger" role="alert">Email and Password incorrect</div>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
					<a class="navbar-brand" href="#">Wellcome to our blogsite</a>
				</div>
				<ul class="nav navbar-nav">
				</ul>
			</div>
		</nav>
	</header>
	<section class="container">
		<div class="col-md-6 col-md-offset-3">
			<br><br>
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-body">
						<?php foreach ($msg as $key => $value) 
						{
							echo $value;
						} 
						?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<h4>Login Form</h4>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
							</div>

							<div class="checkbox">
								<label><input type="checkbox">Remember me</label>
							</div>
							<div>
								<button type="submit" class="btn btn-success" href="home.php">Login</button>
								<span>Or<a href="register.php"><strong> Register</strong></span></a>
							</div>
						</form><br>
						<form action="recovery_password.php" method="POST">
							<div>
								<button type="submit" class="btn btn-info" href="recovery_password.php">Forget Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>
	<?php require "footer.php";?>
</body>
</html>