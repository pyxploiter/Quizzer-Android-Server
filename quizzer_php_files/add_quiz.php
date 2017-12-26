<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// check for required fields
		if (empty($_GET['id']) || empty($_GET['title']) || empty($_GET['description']) ) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		} else {
			$id = $_GET['id'];
			$title = $_GET['title'];
			$description = $_GET['description'];

			$query = "INSERT INTO quiz(id, title, description) VALUES($id,'$title','$description')";
	   		
	   		$table = mysqli_query($connection,$query);
	    
			if($table){
				// successfully inserted into database
		        $response["success"] = 1;
    		    $response["message"] = "Quiz successfully created.";
 
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