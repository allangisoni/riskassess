
<?php


/**

// Initialize the session
session_start();
$_SESSION['EXPIRES'] = time() + 9700; 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
   
    //if(strcasecmp($_SESSION["role"], 'operator')== 0){

      header("location: home.php");
        
    
    //else{
    //  header("location: home.php");  
    //}
    
    exit;
}
 
**/

 
// Define variables and initialize with empty values
$myusername = "";
$mypassword = "";
 
// Processing form data when form is submitted
    
     $myusername = trim($_POST["username"]);
     $mypassword = trim($_POST["password"]);
    
    
    
        // Prepare a select statement
        
    try {
       // Include config file   
       // require "http://localhost/reactlearn/my-app/src/config.php";  
        $host = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "triggers"; 
        $dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
        $options    = array(
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                       );
        
        
        
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT  firstname,lastname, role,username, password FROM users WHERE username = '".$myusername."' AND password = '".$mypassword."' ";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    
      if ($result && $statement->rowCount() > 0) { 
    
         foreach ($result as $row) {
          // header("location: home.php");
         //$_SESSION["loggedin"] = true;
        // $_SESSION["username"] = $myusername;
        // $_SESSION["name"] = $row["firstname"]." ".$row["lastname"];
        // $_SESSION["role"] = $row["role"];
              
          
          }
          
          echo json_encode($result);
          
          
          
         } 
        
        
        else{
     
            
        echo "null";    
            
         }
        
    } catch(PDOException $error) {
   
      echo $sql . "<br>" . $error->getMessage();
    }    
   
        
    
    
    // Close connection
   // unset($pdo);

?>
