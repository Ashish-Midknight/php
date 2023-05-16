<?php
	require_once('dbconnection.php');

	$sql = "SELECT * FROM movies";
	$result = mysqli_query($connection, $sql);
	$row_count = mysqli_num_rows($result);
	$files_path = "http://localhost:8080/filmmoz/";

	if($row_count>0){

		while($r = mysqli_fetch_array($result)){
			extract($r);
			$res[] = array("MOVIE_ID" => $movie_id,"USER_ID" => $user_id ,"TITLE" => $title,"DIRECTOR_NAME" => $director_name,"PRODUCER_NAME" => $producer_name, "ACTOR_NAME" => $actor_name ,"CLIENT_NAME" => $client_name, "STORY" => $story , "LANGUAGE" => $language , "MOVIE_PATH" => $files_path.$file_name ,"TRAILER"=>$trailer, "CATEGORY" => $category , "VIEW_COUNT" => $view_count ,"COST_PER_VIEW" => $cost , "THUMBNAIL_PATH" => $files_path.$thumb_file_name , "DATE_AND_TIME" => $upload_time);
		}
		$info["status"] = "200";   //Succefull
		$info["post"] = $res;
	}else{
		$info["status"] = "400";   //Bad Request
	}
	echo json_encode(array('posts' => $info));
?>