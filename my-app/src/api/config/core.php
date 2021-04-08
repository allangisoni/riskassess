<?php
// show error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
  
// home page url
//$home_url="http://localhost/restapitutorial/api/";
$home_url="http://localhost/reactlearn/my-app/src/api/";
  
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
  
// set number of records per page
$records_per_page = 100;
  
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;


// show error reporting
//error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Africa/Nairobi');
 
// variables used for jwt
$key = "tr1ggers_key";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60); // valid for 1 hour
$issuer = "http://localhost/reactlearn/my-app/src/api/";


?>