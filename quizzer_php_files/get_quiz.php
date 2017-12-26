<?php
	error_reporting(0);
	include 'config.php';

	// array for JSON response
	$response = array();

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// check for required fields
		if (empty($_GET['title'])) {
			// required field is missing
    		$response["success"] = 0;
    		$response["message"] = "Required field(s) is missing";
 
		    // echoing JSON response
    		echo json_encode($response);
		} else{
			$title = $_GET["title"];

			// SQL query to fetch quiz.
			$query = "SELECT * FROM quiz where title='$title'";
	
			$result = mysqli_query($connection,$query);

			if($result){
				if(mysqli_num_rows($result) > 0){
					$response["success"] = 1;
			
					$row = mysqli_fetch_row($result);
					
					$response["id"] = $row[0];
					$response["title"] = $row[1];
					$response["description"] = $row[2];

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
		}
		mysql_close($connection); // Closing Connection
	}
?>