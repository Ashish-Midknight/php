<?php
	require_once('dbconnection.php');
	$google_id = $_REQUEST['googleId'];

	$delete_user = "DELETE FROM user WHERE google_id='$google_id'";
	$result = mysqli_query($connection,$delete_user);
	if($result){
			echo "Your Account Has Been Removed Successfully";
		}else{
			echo "Sorry Account Removal Failed";
		}
		$delete_user ->close();
?>