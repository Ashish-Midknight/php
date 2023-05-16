<?php
	require_once('dbconnection.php');

	$google_id1 = $_REQUEST['googleId']; 

	$sql = "SELECT * FROM user WHERE google_id='$google_id1'";
	$result = mysqli_query($connection, $sql);
	$row_count = mysqli_num_rows($result);
	$files_path = "http://localhost:8080/filmmoz/";

	if($row_count>0){

		while($r = mysqli_fetch_array($result)){
			extract($r);
			$res[] = array("GOOGLE_ID" => $google_id,
				"USER_ID" => $user_id ,
				"NAME" => $name,
				"EMAIL" => $email,
				"SUBSCRIPTION_TIME" => $subscription_time, 
				"SUBSCRIPTION_STATUS" => $sub_status ,
				"PURCHASE_DATE" => $sub_purch_date,
				"SUBSCRPTION_END_DATE" => $sub_end_date );
		}
		$info["status"] = "200";   //Succefull
		$info["post"] = $res;
	}else{
		$info["status"] = "400";   //Bad Request
	}
	echo json_encode(array('posts' => $info));
?>