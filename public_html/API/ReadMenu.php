<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//Creating Array for JSON response
$response = array();
 
// Include data base connect class
require_once "../database/db_config.php";
 
 // Fire SQL query to get all data from weather
$result = mysqli_query($db,"SELECT *FROM FoodMenu");
 
// Check for succesfull execution of query and no results found
if (mysqli_num_rows($result) > 0) {
    
	// Storing the returned array in response
    $response["menulist"] = array();
 
	// While loop to store all the returned response in variable
    while ($row = mysqli_fetch_array($result)) {
        // temperoary user array
        $menulist = array();
        $menulist["id"] = $row["id"];
        $menulist["Food_details"] = $row["Food_details"];
		$menulist["Price"] = $row["Price"];
		// Push all the items 
        array_push($response["menulist"], $menulist);
    }
    // On success
    $response["success"] = 1;
 
    // Show JSON response
    echo json_encode($response);
}	
else 
{
    // If no data is found
	$response["success"] = 0;
    $response["message"] = "No data on weather found";
 
    // Show JSON response
    echo json_encode($response);
}
?>