<?php
include 'db_controller.php';

if ($_POST) {
session_start();
$email = $_POST['email'];
$newPassword = $_POST['newPassword'];
$ConfirmNewPassword = $_POST['ConfirmNewPassword'];

if ($newPassword == $ConfirmNewPassword) {
		$sql = "select * from member where email = '".$email."'";


	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

			$conn->query("update member set password = '".$newPassword."' where email='".$email."';");

			$_SESSION["msg"] = "Password updated";

			header("Location: recovery_password.php");

	} else {
			header("Location: recovery_password.php");
		
	}
}
else{

	$_SESSION["msg"] = "Paswords not match";
	header("Location: recovery_password.php");

}

}
