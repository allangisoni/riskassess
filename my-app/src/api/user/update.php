<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  

// generate json web token
include_once '../config/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;



// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare user object
$user = new User($db);
  
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));


 
// get jwt
$jwt=isset($data->jwt) ? $data->jwt : "";
 
// decode jwt here
// if jwt is not empty
if($jwt){
 
    // if decode succeed, show user details
    try {
 
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));


        // set ID property of user to be edited
        $user->id =  $decoded->data->id;;
  
        // set product property values
        $user->firstname = $data->firstname;
        $user->role = $data->role;
        $user->username = $data->username;
        $user->password = $data->password;


        // update the user record
       if($user->update()){
   
      // we need to re-generate jwt because user details might be different
       $token = array(
      "iat" => $issued_at,
      "exp" => $expiration_time,
      "iss" => $issuer,
      "data" => array(
         "id" => $user->id,
         "firstname" => $user->firstname,
         "lastname" => $user->lastname,
         "username" => $user->username
            )
       );
      
      $jwt = JWT::encode($token, $key);
 
      // set response code
     http_response_code(200);
 
     // response in json format
     echo json_encode(
        array(
            "message" => "User was updated.",
            "jwt" => $jwt
        )
      );
        
        }
 
        // message if unable to update user
      else{
    // set response code
      http_response_code(401);
 
    // show error message
      echo json_encode(array("message" => "Unable to update user."));
        }
 
    }
 
    // catch failed decoding will be here
    catch (Exception $e){
 
    // set response code
    http_response_code(401);
 
    // show error message
    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
    }

}
// show error message if jwt is empty
else{
 
    // set response code
    http_response_code(401);
 
    // tell the user access denied
    echo json_encode(array("message" => "Access denied."));
}
 


?>