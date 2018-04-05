<?php 
require "db_controller.php";
require "session.php";
require "function.php";

$msg=array();
if(isset($_GET["id"])) {
    $IdFromURL=$_GET["id"];
    $sql="DELETE FROM admin_registation WHERE id='$IdFromURL'";

    if (mysqli_query($conn, $sql))
       {
    $msg[]='<h3>Admin Delete is successfull!</h3>';
    header("Location: admin.php");
      } else {
    $msg[]='<h3><strong>Sorry</strong>Admin Delete is not successfully!</h3>';
    header("Location: admin.php");
  }
}


?>