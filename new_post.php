
<?php 
session_start();

if (!isset($_SESSION['login'])) 
{
  header('location:login.php');
}

require "db_controller.php";

$msg=array();
if ($_POST) {
  date_default_timezone_set("Asia/Dhaka");
  $currenttime = time();
  //$datetime = strftime("%y-%m-%d %H:%M:%S", $currenttime);
  $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
  $datetime;
  $admin="saddam hossan";
	$title=$_POST['title'];
  $user_id=$_SESSION['user_id'];
  $category=$_POST['category'];
  $image=$_FILES['image']['name'];
  $content=$_POST['content'];
  $target = "Upload/".basename($_FILES['image']['name']);

  $sql="INSERT INTO post(datetime,title, user_id, category, author, image, content)
  VALUES('$datetime','$title', '$user_id', '$category', '$admin', '$image', '$content')";
  move_uploaded_file($_FILES['image']['tmp_name'],$target);

  if (mysqli_query($conn, $sql))
  {
    $msg[]='<h3>Post is successfull!</h3>';
  } else {
    $msg[]='<h3><strong>Sorry</strong> Post is not successfully!</h3>';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>New post</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

 <link rel="stylesheet" href="style.css"/> 
</head>
<body>
  <?php require "header.php";?>
  <div class="raw">
<div class="col-sm-2" style="background-color:lightblue">
<h1 >BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="dashboard.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Dashboard</a></li>
<li><a href="admin.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Admin Manage</a></li>
<li class="active"><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li><a href="about.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;About us</a></li>
<li><a href="contact.php">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact us</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
</div>
  <section class="container">
   <div class="col-md-10 col-md-offset-0">
     <div class="panel panel-success">
     	<div class="panel-heading">
     		<h3>New Post</h3>
     		<div class="panel-body">
           <?php foreach ($msg as $key => $value) 
           {
            echo $value;
          } 
          ?>	
          <form action="new_post.php" method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="text">Title:</label>
             <input type="name" name="title" class="form-control" id="title" placeholder="Title..." required>
           </div>
           <div class="form-group">
             <label for="categoryselect">Category:</label>
             <input name="category" class="form-control" id="categoryselect" placeholder="Select Category" require>
           </div>
           <div class="form-group">
             <label for="imageselect">Select Image:</label>
             <input type="file" name="image" class="form-control" id="image">
           </div>
           <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" rows="5" id="content" id="editor"></textarea>
          </div>           
          <button type="submit" class="btn btn-success">New post</button>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<?php require "footer.php";?>
<script>
 CKEDITOR.replace('content');
</script>
</body>
</html>
