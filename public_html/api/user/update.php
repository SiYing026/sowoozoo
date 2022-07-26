<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$user = new User($db);
  
// get id of booking to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of booking to be edited
$user->email = $data->email;
        
// set booking property values
$user->username = $data->username;
$user->email = $data->email;
$user->password = $data->password;
$user->lastName = $data->lastName;
$user->firstName = $data->firstName;
  
// update the booking
if($user->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "User was updated."));
}
  
// if unable to update the booking, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update user."));
}
?>