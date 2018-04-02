<?php
date_default_timezone_set("Asia/Dhaka");
$currentTime = time();
$dateTime = strftime("%y-%m-%d %H:%M:%S",$currentTime);
echo $dateTime;
?>