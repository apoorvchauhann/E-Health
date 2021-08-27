<?php
// Start the session
session_start();
?>
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//session_start();
//Creating Array for JSON response

$response = array();
 
// Check if we got the field from the user
if (isset($_GET['name']) && isset($_GET['id']) ) {
 
    $name = $_GET['name'];
    $id = $_GET['id'];
    $_SESSION['uid']=$id;
    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
 
    // Fire SQL query to insert data in weather
    $result = mysql_query("INSERT INTO login(name,id) VALUES('$name','$id')");
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        //$response["success"] = 1;
        $response["message"] = "successfully created.";
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
       // $response["success"] = 0;
        echo "Welcome ";
        echo $name;
        
        // Show JSON response
       // echo json_encode($response);
    }
    header("Location: https://vineetiot.000webhostapp.com/displaydbfinal.php");
} 
else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>
