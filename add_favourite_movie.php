<?php
require_once('dbconnection.php');
$user_id = $_REQUEST['user_id'];
$movie_id = $_REQUEST['movie_id'];


$is_error = false;
if(!isset($_REQUEST['user_id'])){
	$is_error = true;
}

if(!isset($_REQUEST['movie_id'])){
	$is_error = true;
}

	if($is_error){
		echo "plz check movie Id or user Id";
	}else{
		//echo "Everything Working Fine";
		$remove_fav_movie = "DELETE FROM favourite_movies WHERE user_id ='$user_id' AND movie_id='$movie_id' ";
		$save_fav_movie = "INSERT INTO favourite_movies(movie_id,user_id) VALUES('$movie_id','$user_id')";

		$fav_movies = "SELECT * FROM favourite_movies WHERE user_id ='$user_id' AND movie_id='$movie_id'";
	
		$result = mysqli_query($connection,$fav_movies);
		$row_count = mysqli_num_rows($result);

		if($row_count>0){
			$result1 = mysqli_query($connection,$remove_fav_movie);

			if($result1){
				$is_error = false;
				echo "Movie Added To Favourites";
			}else{
				$is_error = true;
				echo "Sorry , Movie cannot be Added to Favourites";
			}
		}else{
			$result1 = mysqli_query($connection,$save_fav_movie);

			if($result1){
				$is_error = false;
				echo "Movie Added To Favourites";
			}else{
				$is_error = true;
				echo "Sorry , Movie cannot be Added to Favourites";
			}
		}
	}
?>