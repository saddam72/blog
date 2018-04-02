 <?php require "db_controller.php";?>
 <?php
 $msg=array();
 if ($_POST) {
 	$email=$_POST['email'];
 	$password=$_POST['password'];
 	$sql="SELECT * FROM member WHERE email='$email' AND password='$password'";

 	if (mysqli_query($conn, $sql)) 
 	{
 		$msg[]='<div class="alert alert-success" role="alert">Email and Password Verify</div>';

 	} else {

 		$msg[]='<div class="alert alert-success" role="alert">Email and Password incorrect</div>';
 	}
 }
 ?>
 
 <?php foreach ($msg as $key => $value) 
 {
 	echo $value;
 } 
 ?>