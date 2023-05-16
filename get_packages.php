<?php 
	require_once('dbconnection.php');
	$select_all = "SELECT * FROM sub_package";
	$result = mysqli_query($connection,$select_all);
	$row_count = mysqli_num_rows($result);

	if($row_count>0){

		while($r = mysqli_fetch_array($result)){
			extract($r);
			$res[] = array("ID" => $id,"NAME" => $p_name,"PRICE" => $price,"DURATION" => $dur_month );
		}
		$info["status"] = "200";   //Succefull
		$info["post"] = $res;
	}else{
		$info["status"] = "400";   //Bad Request
	}
	echo json_encode(array('posts' => $info));
 ?>