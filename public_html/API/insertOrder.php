<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//Creating Array for JSON response
$response = array();
 

// Check if we got the field from the user
if (isset($_POST['order']) && isset($_POST['quantity'])) {
 
    $details = $_POST['order'];
    $quantity = $_POST['quantity'];
    $station = $_POST['station'];
    $status = $_POST['status'];
      $cost = $_POST['cost'];
       $remarks = $_POST['remarks'];
 
    // Include data base connect class
  require_once "../database/db_config.php";
 
    // Fire SQL query to insert data in weather
  
      $sql=  "INSERT INTO Orders(Order_Details,Quantity,Total_Cost,Station,status,remarks) VALUES('$details','$quantity','$cost','$station','$status','$remarks')";
   $result = mysqli_query($db,$sql);
   
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Order successfully created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>