<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Password</title>
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
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-body">
						<h1>Change Password</h1>
						<p><?php echo  isset($_SESSION['msg'])? $_SESSION['msg']:"";
						unset($_SESSION['msg']);
						?></p>
						<form method="post" action="recover.php">
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Email" required >
							</div>

							<div class="form-group">
								<label for="newPassword">New Password:</label>
								<input type="password" class="form-control" id="newPassword" name="newPassword" title="New password" placeholder="New Password" required/>
							</div>

							<div class="form-group">
								<label for="ConfirmNewPassword">Confirm Password:</label>
								<input type="ConfirmNewPassword" class="form-control" id="ConfirmNewPassword" name="ConfirmNewPassword" title="Confirm new password" placeholder="Confirm Password" required/>
							</div>

							<p class="form-actions">
								<input type="submit" value="Change Password" class="btn btn-success title="Change password" />
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php require "footer.php";?>
</body>
</html>