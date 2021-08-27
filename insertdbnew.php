<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
if (isset($_GET['temp']) && isset($_GET['ecg']) ) {
 
    $temp = $_GET['temp'];
    $ecg = $_GET['ecg'];
    $uid = $_GET['uid'];
    $_SESSION['uidd']=$uid;
 
    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
    
    // Fire SQL query to insert data in health
    $result = mysql_query("INSERT INTO newpatient(temp,ecg,uid) VALUES('$temp','$ecg','$uid')");
    //$sql="INSERT INTO health(temp,ecg,oxygen) VALUES('$temp','$ecg','$oxygen')";
   // mysqli_query($conn, $sql)
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "health successfully created.";
 
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