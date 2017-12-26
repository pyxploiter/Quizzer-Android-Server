<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// check for required fields
		if (empty($_GET['quiz_id']) || empty($_GET['question']) || empty($_GET['question_type']) || empty($_GET['expected_answer'])) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		} else {
			$quiz_id = $_GET['quiz_id'];
			$question_id = $_GET['question_id'];
			$question = $_GET['question'];
			$question_type = $_GET['question_type'];
			$option1 = $_GET['option1'];
			$option2 = $_GET['option2'];
			$option3 = $_GET['option3'];
			$option4 = $_GET['option4'];
			$expected_answer = $_GET['expected_answer'];

			$query = "INSERT INTO question(quiz_id, question, question_type, option1, option2, option3, option4, expected_answer) VALUES($quiz_id, '$question', '$question_type', '$option1', '$option2', '$option3', '$option4', '$expected_answer')";
	   		
	   		$table = mysqli_query($connection,$query);
	    
			if($table){
				// successfully inserted into database
		        $response["success"] = 1;
    		    $response["message"] = "Question successfully added.";
 
        		// echoing JSON response
        		echo json_encode($response);
			} else {
				// failed to insert row
		        $response["success"] = 0;
		        $response["message"] = "Oops! An error occurred.";
		 
		        // echoing JSON response
		        echo json_encode($response);
			}
		}
		mysqli_close($connection); // Closing Connection
	}
?>