<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (empty($_GET['username']) || empty($_GET['password']) || empty($_GET['type'])) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		}
		else {
			$username = $_GET['username'];
			$passwd = $_GET['password'];
			$type = $_GET['type'];

			$username = stripslashes($username);
			$passwd = stripslashes($passwd);
			$username = mysql_real_escape_string($username);
			$passwd = mysql_real_escape_string($passwd);

			// SQL query to fetch information of registerd users and finds user match.
			$query = "SELECT * FROM user WHERE username='".$username."' AND password='".$passwd."' AND type='".$type."'";
			
			$result = mysqli_query($connection,$query);

			if($result){
				$rows=mysqli_num_rows($result);

				if($rows == 1){
					// login successful
		        	$response["success"] = 1;
    		    	$response["message"] = "User logged in successfully.";
 
        			// echoing JSON response
        			echo json_encode($response);
				}
				else {
					// no user found
		            $response["success"] = 0;
		            $response["message"] = "No user found";
		 
		            // echo no users JSON
		            echo json_encode($response);
				}
			}
		}
		mysql_close($connection); // Closing Connection
	}
?>