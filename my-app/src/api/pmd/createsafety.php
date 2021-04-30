<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/safetypmd.php';
  
$database = new Database();
$db = $database->getConnection();
  
$safetypmd = new SafetyPmd($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));

$postedcurrentdate = isset($data->currentdate) ? $data->currentdate  : trim($_POST["currentdate"]);
$postedlastupdatedate = isset($data->lastupdatedate) ? $data->lastupdatedate  : trim($_POST["lastupdatedate"]);
//$postedsupervisor = isset($data->supervisor) ? $data->supervisor  : trim($_POST["supervisor"]);
$postedoperator = isset($data->operator) ? $data->operator  : trim($_POST["operator"]);
$postedline = isset($data->line) ? $data->line  : trim($_POST["line"]);
$postedshift = isset($data->shift) ? $data->shift  : trim($_POST["shift"]);
$postedtotalscore = isset($data->totalscore) ? $data->totalscore  : trim($_POST["totalscore"]);
$postedactualrisk = isset($data->actualrisk) ? $data->actualrisk  : trim($_POST["actualrisk"]);
  
// make sure data is not empty
if(
    !empty($postedcurrentdate) &&
    !empty($postedlastupdatedate ) &&
   // !empty($postedsupervisor ) &&
    !empty($postedoperator)&&
    !empty($postedline )&&
    !empty($postedshift)&&
    !empty($postedtotalscore )&&
    !empty($postedactualrisk )
){
  
    // set user property values
    $safetypmd->currentdate =  isset($data->currentdate) ? $data->currentdate  : trim($_POST["currentdate"]);
    $safetypmd->lastupdatedate = isset($data->lastupdatedate) ? $data->lastupdatedate  : trim($_POST["lastupdatedate"]);
    $safetypmd->supervisor = isset($data->supervisor) ? $data->supervisor  : trim($_POST["supervisor"]);
    $safetypmd->operator = isset($data->operator) ? $data->operator  : trim($_POST["operator"]);
    $safetypmd->line = isset($data->line) ? $data->line  : trim($_POST["line"]);
    $safetypmd->shift = isset($data->shift) ? $data->shift  : trim($_POST["shift"]);
    $safetypmd->total1 = isset($data->total1) ? $data->total1  : trim($_POST["total1"]);
    $safetypmd->total2 = isset($data->total2) ? $data->total2  : trim($_POST["total2"]);
    $safetypmd->total3 = isset($data->total3) ? $data->total3  : trim($_POST["total3"]);
    $safetypmd->total4 = isset($data->total4) ? $data->total4  : trim($_POST["total4"]);
    $safetypmd->total5 = isset($data->total5) ? $data->total5  : trim($_POST["total5"]);
    $safetypmd->total6 = isset($data->total6) ? $data->total6  : trim($_POST["total6"]);
    $safetypmd->total7 = isset($data->total7) ? $data->total7  : trim($_POST["total7"]);
    $safetypmd->total8 = isset($data->total8) ? $data->total8  : trim($_POST["total8"]);
    $safetypmd->total9 = isset($data->total9) ? $data->total9  : trim($_POST["total9"]);
    $safetypmd->total10 = isset($data->total10) ? $data->total10  : trim($_POST["total10"]);
    $safetypmd->totalscore = isset($data->totalscore) ? $data->totalscore  : trim($_POST["totalscore"]);;
    $safetypmd->actualrisk = isset($data->actualrisk) ? $data->actualrisk  : trim($_POST["actualrisk"]);;
    $safetypmd->countermeasures = isset($data->countermeasures) ? $data->countermeasures  : trim($_POST["countermeasures"]);;
  
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