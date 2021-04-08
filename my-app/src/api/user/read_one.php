<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');


// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$user = new User($db);
  
// read users will be here
// set ID property of record to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of user to be edited
$user->readOne();


if($user->lastname!=null){
    // create array
 
      $user_arr=array(
            "id" => $user->id,
            "firstname" => $user->firstname,
            "lastname" => $user->lastname ,
            "role" => $user->role,
            "username" => $user->username,
            "password" => $user->password
        );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($user_arr);
}

// no users found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no users found
    echo json_encode(
        array("message" => "User does not exist.")
    );
}


?>