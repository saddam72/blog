<?php 
require "db_controller.php";
require "session.php";
require "function.php";

$msg=array();
if(isset($_GET["id"])) {
    $IdFromURL=$_GET["id"];
    $sql="DELETE FROM category WHERE id='$IdFromURL'";

    if (mysqli_query($conn, $sql))
       {
    $msg[]='<h3>Category Delete is successfull!</h3>';
    header("Location: category.php");
      } else {
    $msg[]='<h3><strong>Sorry</strong>Category Delete is not successfully!</h3>';
    header("Location: category.php");
  }
}

?>