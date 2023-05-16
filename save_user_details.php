<?php
require_once('dbconnection.php');

$google_id1 = $_REQUEST['googleid'];
$email =$_REQUEST['email'];
$name =$_REQUEST['name'];

$create_user = "INSERT INTO user(google_id,email,name) VALUES('$google_id1','$email','$name')";

$user = "SELECT * FROM user WHERE google_id ='$google_id1'";

$result = mysqli_query($connection,$user);
$row_count = mysqli_num_rows($result);

if($row_count>0){
	echo "User Already Exists";
}else{
	$result1 = mysqli_query($connection,$create_user);
	if ($result1) {
		echo "User Created Successfully";
	}else{
		echo "Sorry,Failed To Connect User";
	}
}


?>