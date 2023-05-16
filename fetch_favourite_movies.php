<?php
require_once('dbconnection.php');

$user_id = $_REQUEST['user_id'];
$files_path = "http://localhost:8080/filmmoz/";
$is_error = false;

if(!isset($_REQUEST['user_id'])){
	$is_error = true;
}

if($is_error){
	echo "User ID Not Set";
}else{
	$fav_movies = "SELECT f.* ,m.* FROM favourite_movies f,movies m WHERE f.movie_id= m.movie_id and f.user_id='$user_id'";

	
	
	$result = mysqli_query($connection,$fav_movies);
	$row_count = mysqli_num_rows($result);

	if($row_count>0){

		while ($r = mysqli_fetch_array($result)) {
			extract($r);

			$res[] = array("MOVIE_ID" => $movie_id,"USER_ID" => $user_id ,"TITLE" => $title,"DIRECTOR_NAME" => $director_name,"PRODUCER_NAME" => $producer_name, "ACTOR_NAME" => $actor_name ,"CLIENT_NAME" => $client_name, "STORY" => $story , "LANGUAGE" => $language , "MOVIE_PATH" => $file_name ,"TRAILER"=>$trailer, "CATEGORY" => $category , "VIEW_COUNT" => $view_count ,"COST_PER_VIEW" => $cost , "THUMBNAIL_PATH" => $files_path.$thumb_file_name , "DATE_AND_TIME" => $upload_time);

		}

		$info['status'] = "200";		//Successfull
		$info['post'] = $res; 
	}else{
		$info["status"] = "400";		//Bad Request
	}

	$d= json_encode(array('posts' => $info));
	echo $d;

}

?>