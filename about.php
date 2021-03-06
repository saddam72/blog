<?php 
session_start();

require "header.php";

if(!isset($_SESSION['login'])) 
{
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Blog Site</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
<div class ="container-fluid">
<div class="raw">
<div class="col-sm-2" style="background-color:lightblue">
<h1 >BLOG</h1>
<ul class="nav nav-pills nav-stacked">
<li><a href="home.php">
<span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Home</a></li>
<li><a href="service.php">
<span class="glyphicon glyphicon-user"></span>&nbsp;Service</a></li>
<li><a href="category.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Category</a></li>
<li><a href="new_post.php">
<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Add New Post</a></li>
<li class="active"><a href="about.php">
<span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;About us</a></li>
<li><a href="contact.php">
<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Contact us</a></li>
<li><a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
</ul>
</div>
</div>
<div class="container">
<div align="center">
<h3><strong><span class="text-primary">About Us</span></strong></h3>
</div>
	<div class="col-sm-10" align="justify">
    <p>
     একেবারে জ্বলন্ত উনুনে বসে খেলা দেখেছেন নাঈমুর রহমান। শ্রীলঙ্কার সঙ্গে শ্রীলঙ্কার মাঠে খেলা, সেই খেলায় আবার কত-না ঘটনা! খেলোয়াড়দের মধ্যে হাতাহাতি হওয়াটাই কেবল বাকি ছিল। প্রেমাদাসা স্টেডিয়ামের প্রেসিডেন্ট বক্সকে জ্বলন্ত উনুন বলবেন না তো কী বলবেন? শ্রীলঙ্কা ক্রিকেটের বড় কর্তারা তো ওখানে বসেই খেলা দেখেন! পরশু সেখান থেকে শ্রীলঙ্কার বিপক্ষে জয় দেখার পর নাঈমুরের উপলব্ধি, নিদাহাস ট্রফির ফাইনালে উঠলেও শ্রীলঙ্কায় আপাতত ‘নিঃসঙ্গ’ হয়ে পড়ল বাংলাদেশ দল।

     ‘বাংলাদেশের কাছে ওভাবে হারার পর ফাইনালের জন্য শ্রীলঙ্কানরা এখন ভারতকে সমর্থন দিচ্ছে। বাংলাদেশের ভালো খেলার প্রশংসা কারও মুখে শুনছি না। ফাইনালে বাংলাদেশ দলের সমর্থক থাকবে শুধু আমাদের মতো কিছু বাংলাদেশি’, কলম্বো থেকে মুঠোফোনে রসিকতা করে কথাগুলো বলছিলেন বিসিবি পরিচালক ও বাংলাদেশের প্রথম টেস্ট অধিনায়ক নাঈমুর। অবশ্য শ্রীলঙ্কার বিপক্ষে বাংলাদেশের দুর্দান্ত জয় নাকি প্রশংসা পেয়েছে প্রেসিডেন্ট বক্সে বসে খেলা দেখা ভারতীয় ক্রিকেট বোর্ডের কর্মকর্তাদের।

     শ্রীলঙ্কানদের ভিড়ে বসে খেলা দেখাদের মধ্যে ছিলেন বিসিবি সভাপতি নাজমুল হাসানও। 
	 
	 
	 বোর্ড সভাপতি যেহেতু, একটু কূটনৈতিক তো তাঁকে হতেই হয়। কলম্বোয় বাংলাদেশি সাংবাদিকদের কাছে প্রেসিডেন্ট বক্সে খেলা দেখার অভিজ্ঞতার বর্ণনা করতে গিয়ে সতর্ক নাজমুল হাসান, ‘প্রেসিডেন্ট বক্সে কোনো উত্তেজনা ছিল, তা নয়। বুঝতেই পারছেন ওখানে স্বাভাবিকভাবেই শ্রীলঙ্কান বেশি ছিল। আমরা হাতেগোনা চার-পাঁচজন বাংলাদেশি...।’ তবে ‘সংখ্যালঘু’ হওয়াটা আত্মবিশ্বাসে চিড় ধরাতে পারেনি সভাপতির। মাহমুদউল্লাহ ক্রিজে ছিলেন বলে শেষ পর্যন্ত নাকি তিনি আশাবাদী ছিলেন-বাংলাদেশই জিতবে।

     একই আশায় বুক বেঁধে ছিলেন নাঈমুরও এবং সেই আশারও প্রাণভোমরা ছিলেন মাহমুদউল্লাহ, ‘আমার বিশ্বাস ছিল রিয়াদ (মাহমুদউল্লাহ) থাকলে জিতে যাব। কারণ শেষ দিকে ছক্কার দরকার হবে আর রিয়াদ ছক্কা ভালো মারতে পারে।’ ব্যাট-বলের লড়াই ছাড়াও শ্রীলঙ্কার খেলোয়াড়দের সঙ্গে বাংলাদেশের খেলোয়াড়দের শরীরী ভাষা আর কথার যে লড়াই হয়েছে, সেটির মূল কারণ আম্পায়ারের একটি ভুল সিদ্ধান্ত। ক্রিকেটের জন্যই এটাকে ‘দুর্ভাগ্যজনক’ মনে করেন নাঈমুর।

     এ রকম ঘটনায় অনেক সময় দুই বোর্ডের সম্পর্কেও শীতলতা তৈরি হয়। তবে বিসিবি কর্মকর্তারা কলম্বোয় এখন পর্যন্ত সে রকম কিছু টের পাননি বলেই খবর। ম্যাচ শেষে শ্রীলঙ্কান কর্মকর্তাদের অভিনন্দনে সিক্ত হয়েছেন তাঁরা। বিসিবি সভাপতির বিশ্বাস, ‘শ্রীলঙ্কান বোর্ডের সঙ্গে আমাদের সম্পর্কটা বেশ শক্ত। মনে হয় না এ ঘটনায় সম্পর্কে চিড় ধরবে।’

     শ্রীলঙ্কার সঙ্গে অলিখিত সেমিফাইনালটিকে পেছনে ফেলে এখন অবশ্য সবার চোখই আজকের ফাইনালে। ফাইনালে সাফল্য লাভে খেলোয়াড়দের জন্য নাঈমুরের মন্ত্র, ‘আমি চাই তারা যেন চাপ না নেয়। টি-টোয়েন্টিতে ভারত অনেক শক্ত প্রতিপক্ষ। কিন্তু আমরা শ্রীলঙ্কার বিপক্ষে দুটি ম্যাচই ভালোভাবে জিতে আমাদের সামর্থ্য দেখিয়েছি।’

     প্রধান নির্বাচক মিনহাজুল আবেদীনও বিশ্বাস করেন কথাটা। বাংলাদেশ দলের সামর্থ্য আছে ভারতকে হারিয়ে নিদাহাস ট্রফির শিরোপা জেতার, ‘ভারত আগে ব্যাট করলে ওদের যদি আমরা ১৬০-১৬৫-এর মধ্যেও রাখতে পারি, আমার মনে হয় জেতা সম্ভব। আমাদের সর্বাত্মক চেষ্টা করতে হবে।’
	</p>
	</div>
	</div>
	</div>
	</div>
	<hr>
	<div align="center">
	<br><p><h2>Md. Saddam Hossan</h2><h4>Address: Baridhara DOHS, Dhaka-1206,
	Bangladesh.<br>Gmail: codalosdm@gmail.com<br>Mobile: 01918565714</h4></p>
	</div>
<?php require "footer.php";?>
</body>
</html>
