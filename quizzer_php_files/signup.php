<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// check for required fields
		if (empty($_GET['username']) || empty($_GET['password']) || empty($_GET['email']) || empty($_GET['type'])) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		} else {
			$type = $_GET['type'];
			$username = $_GET['username'];
			$email = $_GET['email'];
			$password = $_GET['password'];

			$query = "INSERT INTO user(username, type, email, password) VALUES('$username','$type','$email','$password')";
	   		
	   		$table = mysqli_query($connection,$query);
	    
			if($table){
				// successfully inserted into database
		        $response["success"] = 1;
    		    $response["message"] = "User successfully created.";
 
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