<?php
require_once('dbconnection.php');

$startDate   = $_REQUEST['startDate'];
$endDate     =$_REQUEST['endDate'];
$googleId    =$_REQUEST['googleId'];
$packageTime =$_REQUEST['packageTime'];

$update_sub = "UPDATE user SET subscription_time='$packageTime',sub_status='
active',sub_purch_date='$startDate',sub_end_date='$endDate' WHERE google_id ='$googleId'";


$result = mysqli_query($connection,$update_sub);

if($result){
	echo "Successfully Subscribed";
}else{
	echo "Sorry, Failed To Subscribe" ;
}


?>