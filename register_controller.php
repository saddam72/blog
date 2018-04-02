
<?php require "db_controller.php";?>
<?php
$msg=array();
if ($_POST) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	$sql="INSERT INTO member(id, name, email, mobile, password) VALUES(NULL, '$name', '$email', '$mobile', '$password')";

	if (mysqli_query($conn, $sql))
	{
		$msg[]='<div class="alert alert-success" role="alert">Register is successfull!</div>';
	} else {
		$msg[]='<div class="alert alert-success" role="alert"><strong>Sorry</strong> Register is not successfully!</div>';
	}
}

?>
<?php foreach ($msg as $key => $value) 
{
	echo $value;
} 
?>