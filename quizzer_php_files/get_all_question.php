<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (empty($_GET['quiz_id'])) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		} else{
			$quiz_id = $_GET['quiz_id'];
			// SQL query to fetch all quizzes.
			$query = "SELECT * FROM question where quiz_id='$quiz_id'";
			
			$result = mysqli_query($connection,$query);

			if($result){
				if(mysqli_num_rows($result) > 0){
					$response["success"] = 1;
					$response["questions"] = array();
					while ($row = mysqli_fetch_row($result)){
						$questions = array();
						$questions["quiz_id"] = $row[0];
						$questions["question_id"] = $row[1];
						$questions["question"] = $row[2];
						$questions["question_type"] = $row[3];
						$questions["option1"] = $row[4];
						$questions["option2"] = $row[5];
						$questions["option3"] = $row[6];
						$questions["option4"] = $row[7];
						$questions["expected_answer"] = $row[8];

						array_push($response["questions"], $questions);
					}

	    			// echoing JSON response
	    			echo json_encode($response);
				}
				else {
					// no quiz found
		            $response["success"] = 0;
		            $response["message"] = "No Question found";
		 
		            // echo no users JSON
		            echo json_encode($response);
				}
			}
		}
		
		mysql_close($connection); // Closing Connection
	}
?>