<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/safetypmd.php';
  
$database = new Database();
$db = $database->getConnection();
  
$safetypmd = new SafetyPmd($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->currentdate) &&
    !empty($data->lastupdatedate) &&
    !empty($data->supervisor) &&
    !empty($data->operator)&&
    !empty($data->line)&&
    !empty($data->shift)&&
    !empty($data->totalscore)&&
    !empty($data->actualrisk)
){
  
    // set user property values
    $safetypmd->currentdate = $data->currentdate;
    $safetypmd->lastupdatedate = $data->lastupdatedate;
    $safetypmd->supervisor = $data->supervisor;
    $safetypmd->operator = $data->operator;
    $safetypmd->line = $data->line;
    $safetypmd->shift = $data->shift;
    $safetypmd->total1 = $data->total1;
    $safetypmd->total2 = $data->total2;
    $safetypmd->total3 = $data->total3;
    $safetypmd->total4 = $data->total4;
    $safetypmd->total5 = $data->total5;
    $safetypmd->total6 = $data->total6;
    $safetypmd->total7 = $data->total7;
    $safetypmd->total8 = $data->total8;
    $safetypmd->total9 = $data->total9;
    $safetypmd->total10 = $data->total10;
    $safetypmd->totalscore = $data->totalscore;
    $safetypmd->actualrisk = $data->actualrisk;
    $safetypmd->countermeasures = $data->countermeasures;
  
    // create the product
    if($safetypmd->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Record was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create record."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create record. Data is incomplete."));
}
?>