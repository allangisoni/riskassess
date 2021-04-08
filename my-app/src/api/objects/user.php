<?php
class User{
  
    // database connection and table name
    private $conn;
    private $table_name = "users";
  
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $role;
    public $username;
    public $password;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



// read users
function read(){
  
    // select all query
    $query = "SELECT * FROM ". $this->table_name ." ORDER BY id DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}



// used when filling up the user update form
function readOne(){
  
    // query to read single record
    $query = "SELECT
              *
            FROM
                " . $this->table_name . " 
            WHERE
                id = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->firstname = $row['firstname'];
    $this->lastname = $row['lastname'];
    $this->role = $row['role'];
    $this->username = $row['username'];
    $this->password = $row['password'];
}



// create user
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                firstname=:firstname, lastname=:lastname, role=:role, username=:username, password=:password";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->role=htmlspecialchars(strip_tags($this->role));
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
  
    // bind values
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":role", $this->role);
    $stmt->bindParam(":username", $this->username);

    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
    //$stmt->bindParam(":password", $this->password);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}


// update user
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                  firstname=:firstname, lastname=:lastname, role=:role, username=:username, password=:password
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
     // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->role=htmlspecialchars(strip_tags($this->role));
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind values
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":role", $this->role);
    $stmt->bindParam(":username", $this->username);
    //$stmt->bindParam(":password", $this->password);
    
    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);

    $stmt->bindParam(':id', $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}



// delete user
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}



// check username exists

// check if given email exist in the database
function usernameExists(){
 
    // query to check if username exists
    $query = "SELECT id, firstname, lastname,role,username, password
            FROM " . $this->table_name . "
            WHERE username = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
 
    // bind given username value
    $stmt->bindParam(1, $this->username);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if username exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->username = $row['username'];
        $this->role = $row['role'];
        $this->password = $row['password'];
 
        // return true because username exists in the database
        return true;
    }
 
    // return false if username does not exist in the database
    return false;
}



// read users with pagination
public function readPaging($from_record_num, $records_per_page){
  
    // select query
    $query = "SELECT
               *
            FROM
                " . $this->table_name . " 
            ORDER BY id DESC
            LIMIT ?, ?";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind variable values
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
  
    // execute query
    $stmt->execute();
  
    // return values from database
    return $stmt;
}


// used for paging users
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $row['total_rows'];
}



}
?>