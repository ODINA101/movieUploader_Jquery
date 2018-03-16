<?php
 if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$servername = "localhost";
$username = "id3683768_admin101";
$password = "admin";
 
    $conn = new PDO("mysql:host=$servername;dbname=id3683768_tokens", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     $Usertoken = file_get_contents("php://input");
     if(isset($Usertoken)) {
        $request = json_decode($Usertoken);
        $tkn = $request->token;
        $sql1 = "SELECT * FROM token WHERE token='$tkn'";
        if($conn->query($sql1)->rowCount() > 0) {
              
        }else{
     $sql = "INSERT INTO token (token) VALUES ('$tkn')";
     $conn->query($sql);
        }
    }
 
?>