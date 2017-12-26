<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {

		// SQL query to fetch all quizzes.
		$query = "SELECT * FROM quiz";
		
		$result = mysqli_query($connection,$query);

		if($result){
			if(mysqli_num_rows($result) > 0){
				$response["success"] = 1;
				$response["quizzes"] = array();
				while ($row = mysqli_fetch_row($result)){
					$quizzes = array();
					$quizzes["id"] = $row[0];
					$quizzes["title"] = $row[1];
					$quizzes["description"] = $row[2];

					array_push($response["quizzes"], $quizzes);
				}

    			// echoing JSON response
    			echo json_encode($response);
			}
			else {
				// no quiz found
	            $response["success"] = 0;
	            $response["message"] = "No Quiz found";
	 
	            // echo no users JSON
	            echo json_encode($response);
			}
		}
		
		mysql_close($connection); // Closing Connection
	}
?>